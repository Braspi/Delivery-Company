<?php

class EmployeeRepository extends DatabaseService {
    function create(CreateEmployeeDto $dto): bool {
        return $this->execute(
            "INSERT INTO `couriers`(`name`, `lastname`, `phone_number`, `hours_from`, `hours_to`, `department_id`) VALUES (?, ?, ?, ?, ?, ?)",
            "sssssi",
            $dto->name, $dto->lastName, $dto->phoneNumber, $dto->hoursFrom, $dto->hoursTo, $dto->departmentId
        );
    }
}