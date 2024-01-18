<?php
namespace _lib\validation\violations;

class NotNullViolation implements Violation {
    private string $message;
    private array $data;

    public function __construct(array $data, string $message = "Not Null violation")
    {
        $this->data = $data;
        $this->message = $message;
    }

    function check($key, $value): bool {
        return isset($this->data[$key]);
    }

    function getMessage(): string
    {
        return $this->message;
    }
}