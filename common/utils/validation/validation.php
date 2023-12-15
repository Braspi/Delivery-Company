<?php

namespace utils\validation;
use ReflectionProperty;

require_once 'violations/index.php';
include "common/utils/validation/validated.php";

class Validation
{
    private array $violations = array();

    public function __construct(Validated $dto, array $data) {
        $reflection = new \ReflectionClass($dto);
        $props = $reflection->getProperties(ReflectionProperty::IS_PUBLIC);
        foreach ($props as $prop) {
            $prop->setValue($dto, $data[$prop->getName()]);
        }
        foreach ($dto->validate() as $key => $violations) {
            $value = $reflection->getProperty($key)->getValue($dto);
            foreach ($violations as $violation) {
                if (!$violation->check($key, $value)) {
                    if (!isset($this->violations[$key]))
                        $this->violations[$key] = $violation->getMessage();
                }
            }
        }
    }

    function execute($res): void
    {
        if (count($this->violations) == 0) return;
        $res->status(400);
        $res->json(array(
            "success" => false,
            "errors" => $this->violations
        ));
        $res->end();
    }
}