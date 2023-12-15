<?php

use utils\validation\Validated;
use utils\validation\violations\LengthViolation;

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
                new LengthViolation(3, 12, "Hasło uzytkownika musi miec od 3 do 12 znaków!"),
            ),
            // "repeatpass" => array( 

            // )
        );
    }
}