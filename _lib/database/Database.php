<?php
class Database {
    private mysqli $mysqli;

    public function __construct(array $config){
        try {
            $this->mysqli = new mysqli($config["host"], $config["user"], $config["pass"], $config["name"], $config["port"]);
            $this->mysqli->set_charset("utf8");
        } catch (Exception $exception) {
            die("Database error: ".$exception->getMessage());
        }
    }

    public function connection(): mysqli {
        return $this->mysqli;
    }
}