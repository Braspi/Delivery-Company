<?php

namespace Project\DeliveryCompany\repositories;
use DatabaseAction;

class UserRepository extends DatabaseAction
{
    function findByLogin(string $login): ?array
    {
        $result = $this->query("SELECT * FROM accounts WHERE login = '$login'");
        if (count($result) <= 0) return null;
        return $result[0];
    }

    function findById(int $id): ?array
    {
        $result = $this->query("SELECT * FROM accounts WHERE id = $id");
        if (count($result) <= 0) return null;
        return $result[0];
    }

    function create(string $login, string $password): bool
    {
        return $this->execute(
            "INSERT INTO `accounts`(`login`, `password`, `registration_date`, `status`) VALUES (?,?,CURRENT_DATE(),'NOT_ACTIVE')",
            "ss",
            $login, $password
        );
    }
}