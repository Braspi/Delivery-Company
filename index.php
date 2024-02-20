<?php
session_start();
include "config.php";

try {
    _require("bootstrap.php");
} catch (Error $exception) {
    ob_clean();
    header('Content-Type: application/json; charset=utf-8');
    http_response_code(500);
    echo json_encode(array(
        "success" => false,
        "message" => "Internal Server Error! ({$exception->getMessage()})",
        "stacktrace" => $exception->getTraceAsString()
    ));
    exit();
}
