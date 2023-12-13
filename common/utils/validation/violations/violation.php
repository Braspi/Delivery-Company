<?php

namespace utils\validation\violations;
interface Violation
{
    function check($value): bool;

    function getMessage(): string;
}