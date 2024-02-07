<?php
$env = @parse_ini_file(".env1");
if (!$env) die("Please create an .env file from the .env.example template");

const root_path = __DIR__;

define("database", array(
    "host" => $env['DATABASE_HOST'],
    "port" => intval($env['DATABASE_PORT']),
    "user" => $env['DATABASE_USER'],
    "pass" => $env['DATABASE_PASS'],
    "name" => $env['DATABASE_NAME']
));
define("development_mode", (boolean)$env['DEBUG']);

ini_set("display_errors", development_mode);