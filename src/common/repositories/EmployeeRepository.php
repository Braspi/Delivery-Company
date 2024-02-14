<?php

use src\controllers\employees\dto\CreateEmployeeDto;
use src\controllers\employees\dto\UpdateEmployeeDto;

class EmployeeRepository extends DatabaseService {
    function create(CreateEmployeeDto $dto): bool {
        return $this->execute(
            "INSERT INTO `couriers`(`name`, `lastname`, `phone_number`, `hours_from`, `hours_to`, `department_id`) VALUES (?, ?, ?, ?, ?, ?)",
            "sssssi",
            $dto->name, $dto->lastName, $dto->phoneNumber, $dto->hoursFrom, $dto->hoursTo, $dto->departmentId
        );
    }
    function find(): array {
        return $this->query("SELECT * FROM `couriers`");
    }
    function findById(int $id): array {
        $result = $this->query("SELECT * FROM `couriers` WHERE id = $id");
        if (count($result) >= 1) return $result[0];
        else return array();
    }
    function delete(int $id): bool {
        return $this->execute("DELETE FROM `couriers` WHERE id = ?", "i", $id);
    }
    function update(UpdateEmployeeDto $dto, int $id): bool
    {
        $str = "";
        if ($dto->name) $str = $str."`name`='{$dto->name}',";
        if ($dto->lastName) $str = $str."`lastname`='{$dto->lastName}',";
        if ($dto->phoneNumber) $str = $str."`phone_number`='{$dto->phoneNumber}',";
        if ($dto->hoursFrom) $str = $str."`hours_from`='{$dto->hoursFrom}',";
        if ($dto->hoursTo) $str = $str."`hours_to`='{$dto->hoursTo}',";
        if ($dto->departmentId) $str = $str."`department_id`='{$dto->departmentId}',";
        $str = rtrim($str, ",");
        return $this->execute("UPDATE `couriers` SET $str WHERE id = ?", "i", $id);
    }
}