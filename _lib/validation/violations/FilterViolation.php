<?php
namespace _lib\validation\violations;

class FilterViolation implements Violation {
    private string $message;
    private int $filter;

    public function __construct(int $filter = FILTER_DEFAULT, string $message = "Filter violation")
    {
        $this->message = $message;
        $this->filter = $filter;
    }

    function check($key, $value): bool {
        return filter_var($value, $this->filter);
    }

    function getMessage(): string
    {
        return $this->message;
    }
}