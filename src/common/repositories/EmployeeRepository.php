<?php

use src\controllers\employees\dto\CreateEmployeeDto;

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
    function delete(int $id): bool {
        return $this->execute("DELETE FROM `couriers` WHERE id = ?", "i", $id);
    }
}