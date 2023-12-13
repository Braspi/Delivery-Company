<?php

namespace utils\validation;
interface Validated
{
    function validate(): array;

    function getData(): array;
}