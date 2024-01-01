<?php

use utils\validation\Validated;
use utils\validation\violations\LengthViolation;

class CreateDepartmentDto implements Validated {
    public string $name;
    public string $street;
    public string $homeNumber;
    public ?int $localNumber;
    public string $postCode;
    public string $city;
    public string $phoneNumber;
    public string $email;

    function validate(): array{
        return array(
            "name" => array(
                new LengthViolation(3, 40, "Nazwa oddziału musi miec od 3 do 40 liter!"),
            )
        );
    }
}