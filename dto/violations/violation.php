<?php
interface Violation {
    function check($value): bool;
    function getMessage(): string;
}