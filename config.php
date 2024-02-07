<?php
$env = @parse_ini_file(".env");
if (!$env) die("Please create an .env file from the .env.example template");

const root_path = __DIR__."/src";

define("database", array(
    "host" => $env['DATABASE_HOST'],
    "port" => intval($env['DATABASE_PORT']),
    "user" => $env['DATABASE_USER'],
    "pass" => $env['DATABASE_PASS'],
    "name" => $env['DATABASE_NAME']
));
define("development_mode", (boolean)$env['DEBUG']);

ini_set("display_errors", development_mode);

function _require(string $path): void {
    require_once root_path."/".$path;
}