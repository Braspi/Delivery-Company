<?php

use utils\validation\Validated;
use utils\validation\violations\LengthViolation;

class CreateEmployeeDto implements Validated {
    public string $name;
    public string $lastName;
    public string $phoneNumber;
    public string $hoursFrom;
    public string $hoursTo;
    public int $departmentId;

    function validate(): array{
        return array(
            "name" => array(
                new LengthViolation(3, 20, "Imię pracownika musi miec od 3 do 20 liter!"),
            ),
            "lastName" => array(
                new LengthViolation(3, 20, "Nazwisko pracownika musi miec od 3 do 20 liter!"),
            )
        );
    }
}