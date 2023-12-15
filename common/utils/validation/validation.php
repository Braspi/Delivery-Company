<?php

namespace utils\validation;
use ReflectionProperty;

require_once 'violations/index.php';

class Validation
{
    private array $violations = array();

    public function __construct(Validated $dto) {
        $reflection = new \ReflectionClass($dto);
        $props = $reflection->getProperties(ReflectionProperty::IS_PUBLIC);
        foreach ($props as $prop) {
            $prop->setValue($dto, $dto->getData()[$prop->getName()]);
        }
        foreach ($dto->validate() as $key => $violations) {
            foreach ($violations as $violation) {
                if (!$violation->check($key, $dto->getData()[$key])) {
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