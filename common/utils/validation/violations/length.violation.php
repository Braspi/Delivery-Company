<?php

namespace utils\validation\violations;

include "violation.php";

class LengthViolation implements Violation
{
    private int $min;
    private int $max;
    private string $message;

    public function __construct(int $min, int $max, string $message = "Length violation")
    {
        $this->min = $min;
        $this->max = $max;
        $this->message = $message;
    }

    function check($value): bool
    {
        $len = strlen($value);
        return $len >= $this->min && $len <= $this->max;
    }

    function getMessage(): string
    {
        return $this->message;
    }
}