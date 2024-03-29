<?php

namespace Project\DeliveryCompany\controllers\department\dto;

use _lib\validation\Validated;
use _lib\validation\violations\FilterViolation;
use _lib\validation\violations\LengthViolation;
use _lib\validation\violations\NotEmptyViolation;
use _lib\validation\violations\PatternViolation;

class CreateDepartmentDto implements Validated {
    public string $name;
    public string $street;
    public string $homeNumber;
    public ?int $localNumber;
    public string $postCode;
    public string $city;
    public string $phoneNumber;
    public string $email;

    function validate(): array
    {
        return array(
            "name" => array(
                new LengthViolation(3, 40, "Nazwa oddziału musi miec od 3 do 40 liter!"),
            ),
            "street" => array(new NotEmptyViolation("Podaj nazwe ulicy!")),
            "homeNumber" => array(new NotEmptyViolation("Podaj numer budynku!")),
            "postCode" => array(new PatternViolation("/^\d{2}-\d{3}$/", "Podaj poprawny kod pocztowy!")),
            "city" => array(new NotEmptyViolation("Podaj poprawne miasto!")),
            "phoneNumber" => array(
                new LengthViolation(9, 9, "Wpisz poprawny numer telefonu"),
            ),
            "email" => array(
                new FilterViolation(FILTER_VALIDATE_EMAIL, "Wpisz poprawny adres email"),
            ),
        );
    }
}