<?php
namespace Project\DeliveryCompany\controllers\vehicles\dto;

use _lib\validation\Validated;
use _lib\validation\violations\LengthViolation;
use _lib\validation\violations\NotEmptyViolation;

class CreateVehicleDto implements Validated {
    public string $brand;
    public string $model;
    public string $registration;
    public int $capacity;
    public int $departmentId;

    #[\Override] function validate(): array
    {
        return array(
            "brand" => array(
                new LengthViolation(3, 20, "Wpisz poprawna marke pojazdu"),
            ),
            "model" => array(
                new LengthViolation(3, 20, "Wpisz poprawny model pojazdu"),
            ),
            "registration" => array(new NotEmptyViolation("Wpisz poprawna rejestracje")),
            "capacity" => array(new NotEmptyViolation("Wpisz ladownosc pojazdu!"))
        );
    }
}