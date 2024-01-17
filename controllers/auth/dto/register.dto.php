<?php

use _lib\validation\Validated;
use _lib\validation\violations\LengthViolation;
use _lib\validation\violations\PasswordViolation;
use _lib\validation\violations\SameAsViolation;

class RegisterDto implements Validated {
    public string $login;
    public string $password;
    public string $repeatpass;

    function validate(): array{
        return array(
            "login" => array(
                new LengthViolation(3, 12, "Login uzytkownika musi miec od 3 do 12 znaków!"),
            ),
            "password" => array(
                new PasswordViolation("Niepoprawny format hasła!"),
            ),
             "repeatpass" => array(
                 new SameAsViolation($this->password, "Podane hasła nie są takie same!"),
             )
        );
    }
}