<?php

use utils\validation\Validated;
use utils\validation\violations\LengthViolation;
use utils\validation\violations\NotNullViolation;
include "common/utils/validation/validated.php";

class LoginDto implements Validated {
    public ?string $login;
    public ?string $password;
    private array $data;

    function validate(): array{
        return array(
            "login" => array(
                new NotNullViolation($this->data),
                new LengthViolation(3, 12, "Login uzytkownika musi miec od 3 do 12 znaków!"),
            ),
            "password" => array(
                new LengthViolation(3, 12, "Hasło uzytkownika musi miec od 3 do 12 znaków!"),
            ),
        );
    }

    public function body($data): void {
        $this->data = $data;
    }
    function getData(): array {
        return $this->data;
    }
}