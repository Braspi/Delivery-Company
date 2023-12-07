<?php
interface Validated {
    function validate(): array;
    function getData(): array;
}