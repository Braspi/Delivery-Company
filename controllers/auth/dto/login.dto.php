<?php

use _lib\validation\Validated;
use _lib\validation\violations\LengthViolation;
use _lib\validation\violations\NotEmptyViolation;

class LoginDto implements Validated {
    public string $login;
    public string $password;

    function validate(): array{
        return array(
            "login" => array(
                new NotEmptyViolation("Login uzytkownika nie moze byc pusty"),
                new LengthViolation(3, 12, "Login uzytkownika musi miec od 3 do 12 znaków!"),
            ),
            "password" => array(
                new LengthViolation(3, 12, "Hasło uzytkownika musi miec od 3 do 12 znaków!"),
            )
        );
    }
}