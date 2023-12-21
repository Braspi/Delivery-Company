<?php

namespace utils\validation;
use ReflectionProperty;

require_once 'violations/index.php';
include "common/utils/validation/validated.php";

class Validation {
    private array $violations = array();

    public function __construct(Validated $dto, array $data) {
        $reflection = new \ReflectionClass($dto);
        $props = $reflection->getProperties(ReflectionProperty::IS_PUBLIC);
        foreach ($props as $prop) {
            $property_key = $prop->getName();
            if (str_starts_with($prop->getType(), "?")) {
                if (!isset($data[$property_key])) $prop->setValue($dto, null);
                else $prop->setValue($dto, $data[$property_key]);
                continue;
            }
            if (isset($data[$property_key])) {
                $prop->setValue($dto, $data[$property_key]);
                continue;
            }
            $this->violations[$property_key] = "Invalid $property_key field in request!";
        }
        foreach ($dto->validate() as $key => $violations) {
            $property = $reflection->getProperty($key);
            if (!$property->isInitialized($dto)) continue;
            $value = $property->getValue($dto);
            foreach ($violations as $violation) {
                // if ($value == null) continue;
                if (!$violation->check($key, $value)) {
                    if (!isset($this->violations[$key]))
                        $this->violations[$key] = $violation->getMessage();
                }
            }
        }
    }
    function execute($res): void{
        if (count($this->violations) == 0) return;
        $res->status(400)->json(array(
            "success" => false,
            "errors" => $this->violations
        ));
        $res->end();
    }
}