<?php
class DatabaseAction {
    function query(string $query): array {
        $response = _lib_db_connection->connection()->query($query);
        $data = array();
        while ($row = $response->fetch_assoc()) {
            $data[] = $row;
        }
        $response->close();
        return $data;
    }
    function execute(string $query, string $types, ...$vars): bool {
        $statement = _lib_db_connection->connection()->prepare($query);
        $statement->bind_param($types, ...$vars);
        $statement->execute();
        $state = $statement->affected_rows > 0;
        $statement->close();
        return $state;
    }
}