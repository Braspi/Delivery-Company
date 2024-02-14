<?php

class VehicleRepository extends DatabaseService {
    function find(): array {
        return $this->query("SELECT * FROM `vehicles` INNER JOIN departments ON departments.id = vehicles.department_id");
    }
}