<?php
namespace utils\validation\violations;

class NotEmptyViolation implements Violation {
    private string $message;

    public function __construct(string $message = "Not Empty violation")
    {
        $this->message = $message;
    }

    function check($key, $value): bool {
        return !empty($value);
    }

    function getMessage(): string
    {
        return $this->message;
    }
}