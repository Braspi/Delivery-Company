<?php

namespace _lib\validation\violations;
interface Violation
{
    function check($key, $value): bool;

    function getMessage(): string;
}