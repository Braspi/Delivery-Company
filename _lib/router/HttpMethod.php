<?php

namespace _lib\router;

enum HttpMethod: string
{
    case GET = "get";
    case POST = "post";
    case DELETE = "delete";
    case PUT = "put";
    case ANY = "any";
    case EXCEPTION_HANDLER = "exception_handler";

    public static function fromName(string $name): HttpMethod {
        foreach (self::cases() as $method) {
            if($name === $method->name) return $method;
        }
       throw new \ValueError("$name is not a valid enum value");
    }

    public static function fromRequest(): HttpMethod{
        try {
            return self::fromName($_SERVER['REQUEST_METHOD']);
        } catch (\ValueError $error) {
            die($error->getMessage());
        }
    }
}