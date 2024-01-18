<?php

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
}