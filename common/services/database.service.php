<?php
class DatabaseService {
    private mysqli $mysqli;

    public function __construct(){
        try {
            $this->mysqli = new mysqli(database["host"], database["user"], "", database["name"], database["port"]);
        } catch (Exception $exception) {
            die("Database error: ".$exception->getMessage());
        }
    }

    function query(string $query): array {
        $response = $this->mysqli->query($query);
        $data = array();
        while ($row = $response->fetch_array()) {
            $data[] = $row;
        }
        return $data;
    }
}