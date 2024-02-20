<?php

use src\controllers\department\dto\CreateDepartmentDto;
use src\controllers\department\dto\UpdateDepartmentDto;

class DepartmentRepository extends DatabaseService {
    function create(CreateDepartmentDto $dto): bool {
        return $this->execute(
            "INSERT INTO `departments`(`name`, `street`, `home_number`, `local_number`, `post_code`, `city`, `phone_number`, `email`) VALUES (?,?,?,?,?,?,?,?)",
            "sssissss",
            $dto->name, $dto->street, $dto->homeNumber, $dto->localNumber, $dto->postCode, $dto->city, $dto->phoneNumber, $dto->email
        );
    }
    function findById(int $id): ?array {
        $result = $this->query("SELECT * FROM `departments` WHERE id = $id");
        if (count($result) <= 0) return null;
        return $result[0];
    }
    function find(): array {
        return $this->query("SELECT * FROM `departments`");
    }
    function delete(int $id): bool {
        $this->execute("DELETE FROM `couriers` WHERE department_id = ? ", "i", $id);
        return $this->execute("DELETE FROM `departments` WHERE id = ?", "i", $id);
    }
    function update(UpdateDepartmentDto $dto, int $id): bool
    {
        $str = "";
        if ($dto->name) $str = $str."`name`='{$dto->name}',";
        if ($dto->street) $str = $str."`street`='{$dto->street}',";
        if ($dto->homeNumber) $str = $str."`home_number`='{$dto->homeNumber}',";
        if ($dto->localNumber) $str = $str."`local_number`=$dto->localNumber,";
        if ($dto->postCode) $str = $str."`post_code`='{$dto->postCode}',";
        if ($dto->city) $str = $str."`city`='{$dto->city}',";
        if ($dto->phoneNumber) $str = $str."`phone_number`='{$dto->phoneNumber}',";
        if ($dto->email) $str = $str."`email`='{$dto->email}',";
        $str = rtrim($str, ",");
        return $this->execute("UPDATE `departments` SET $str WHERE id = ?", "i", $id);
    }
}