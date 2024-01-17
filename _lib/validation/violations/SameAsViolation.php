<?php
namespace _lib\validation\violations;

class SameAsViolation implements Violation {
    private mixed $value;
    private string $message;

    public function __construct(mixed $value, string $message = "Same as violation"){
        $this->value = $value;
        $this->message = $message;
    }

    function check($key, $value): bool {
        return $value == $this->value;
    }

    function getMessage(): string {
        return $this->message;
    }
}