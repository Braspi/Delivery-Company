<?php
namespace utils\validation\violations;

class IsIntegerViolation implements Violation {
    private string $message;

    public function __construct(string $message = "IsInteger violation")
    {
        $this->message = $message;
    }

    function check($key, $value): bool {
        return is_int($value);
    }

    function getMessage(): string
    {
        return $this->message;
    }
}