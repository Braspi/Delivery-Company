<?php

namespace utils\validation;
interface Validated
{
    function validate(): array;
    function body(mixed $data): void;
    function getData(): array;
}