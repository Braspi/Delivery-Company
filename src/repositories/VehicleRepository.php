<?php

namespace Project\DeliveryCompany\repositories;

use CreateVehicleDto;
use DatabaseAction;
use Project\DeliveryCompany\controllers\vehicles\dto\UpdateVehicleDto;

class VehicleRepository extends DatabaseAction
{
    function find(): array
    {
        return $this->query("SELECT vehicles.*, departments.name AS 'department_name' FROM `vehicles` INNER JOIN departments ON departments.id = vehicles.department_id");
    }

    function findById(int $id): array
    {
        $result = $this->query("SELECT * FROM `vehicles` WHERE id = $id");
        if (count($result) >= 1) return $result[0];
        else return array();
    }

    function update(UpdateVehicleDto $dto, int $id): bool
    {
        $str = "";
        if ($dto->brand) $str = $str . "`brand`='{$dto->brand}',";
        if ($dto->model) $str = $str . "`model`='{$dto->model}',";
        if ($dto->registration) $str = $str . "`registration`='{$dto->registration}',";
        if ($dto->capacity) $str = $str . "`capacity`=$dto->capacity,";
        if ($dto->departmentId) $str = $str . "`department_id`=$dto->departmentId,";
        $str = rtrim($str, ",");
        return $this->execute("UPDATE `vehicles` SET $str WHERE id = ?", "i", $id);
    }

    function create(CreateVehicleDto $dto): bool
    {
        return $this->execute(
            "INSERT INTO `vehicles`(`brand`, `model`, `registration`, `capacity`, `department_id`) VALUES (?,?,?,?,?)",
            "sssii",
            $dto->brand, $dto->model, $dto->registration, $dto->capacity, $dto->departmentId
        );
    }

    function delete(int $id): bool
    {
        return $this->execute("DELETE FROM `vehicles` WHERE id = ?", "i", $id);
    }
}