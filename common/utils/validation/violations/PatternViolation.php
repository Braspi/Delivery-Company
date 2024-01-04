<?php
namespace utils\validation\violations;

class PatternViolation implements Violation {
    private string $message;
    private string $pattern;

    public function __construct(string $pattern, string $message = "Pattern violation")
    {
        $this->message = $message;
        $this->pattern = $pattern;
    }

    function check($key, $value): bool {
        return preg_match($this->pattern, $value);
    }

    function getMessage(): string
    {
        return $this->message;
    }
}