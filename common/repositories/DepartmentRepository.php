<?php

class DepartmentRepository extends DatabaseService {
    function create(CreateDepartmentDto $dto): bool {
        return $this->execute(
            "INSERT INTO `departments`(`name`, `street`, `home_number`, `local_number`, `post_code`, `city`, `phone_number`, `email`) VALUES (?,?,?,?,?,?,?,?)",
            "sssissss",
            $dto->name, $dto->street, $dto->homeNumber, $dto->localNumber, $dto->postCode, $dto->city, $dto->phoneNumber, $dto->email
        );
    }
}