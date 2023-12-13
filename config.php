<?php
const database = array(
    "host" => "localhost",
    "port" => 3306,
    "user" => "root",
    "pass" => "12345678",
    "name" => "firma_kurierska"
);
const root_path = __DIR__;

define("component", function (string $name) {
   echo $name;
});