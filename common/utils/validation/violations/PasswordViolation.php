<?php

use utils\validation\violations\Violation;

class PasswordViolation implements Violation {
    private string $message;

    public function __construct(string $message = "Password violation"){
        $this->message = $message;
    }

    function check($key, $value): bool{
        $uppercase = preg_match('@[A-Z]@', $value);
        $lowercase = preg_match('@[a-z]@', $value);
        $number = preg_match('@[0-9]@', $value);
        return $uppercase && $lowercase && $number && strlen($value) >= 8;
    }

    function getMessage(): string {
        return $this->message;
    }
}
