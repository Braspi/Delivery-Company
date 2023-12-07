<?php
class DatabaseService {
    private mysqli $mysqli;

    public function __construct(){
        $this->mysqli = new mysqli(database["host"], database["user"], database["pass"], database["name"], database["port"]);
    }
}