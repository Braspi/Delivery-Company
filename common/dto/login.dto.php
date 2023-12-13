<?php

use utils\validation\Validated;
use utils\validation\violations\LengthViolation;

include "common/utils/validation/validated.php";

class LoginDto implements Validated {
    public string $login;
    public string $password;
    private $data;

    public function __construct($data){
        $this->data = $data;
        $this->login = $data['login'];
        $this->password = $data['password'];
    }

    function validate(): array{
        return array(
            "login" => array(
                new LengthViolation(3, 12, "Login uzytkownika musi miec od 3 do 12 znaków!"),
            ),
            "password" => array(
                new LengthViolation(3, 12, "Hasło uzytkownika musi miec od 3 do 12 znaków!"),
            ),
        );
    }

    function getData(): array
    {
        return $this->data;
    }
}