<?php

namespace src\controllers\employees\dto;

use _lib\validation\Validated;
use _lib\validation\violations\LengthViolation;
use _lib\validation\violations\NotEmptyViolation;

class CreateEmployeeDto implements Validated
{
    public string $name;
    public string $lastName;
    public string $phoneNumber;
    public string $hoursFrom;
    public string $hoursTo;
    public int $departmentId;

    function validate(): array
    {
        return array(
            "name" => array(
                new LengthViolation(3, 20, "Imię pracownika musi miec od 3 do 20 liter!"),
            ),
            "lastName" => array(
                new LengthViolation(3, 20, "Nazwisko pracownika musi miec od 3 do 20 liter!"),
            ),
            "hoursFrom" => array(new NotEmptyViolation("Wpisz godziny pracy kuriera")),
            "hoursTo" => array(new NotEmptyViolation("Wpisz godziny pracy kuriera"))
        );
    }
}