<?php
class DatabaseService {
    private mysqli $mysqli;

    public function __construct(){
        try {
            $this->mysqli = new mysqli(database["host"], database["user"], database["pass"], database["name"], database["port"]);
        } catch (Exception $exception) {
            die("Database error: ".$exception->getMessage());
        }
    }

    function query(string $query): array {
        $response = $this->mysqli->query($query);
        $data = array();
        while ($row = $response->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
    function execute(string $query, string $types, ...$vars): bool {
        $statement = $this->mysqli->prepare($query);
        $statement->bind_param($types, ...$vars);
        $statement->execute();
        return $statement->affected_rows > 0;
    }
}