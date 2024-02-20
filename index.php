<?php
session_start();
include "config.php"; ?>
<?php if(!isset($_SERVER['HTTP_CONTENT_TYPE']) && !str_contains($_SERVER['REQUEST_URI'], "api")) { ?>
<!doctype html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Dashboard</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
        <meta charset="UTF-8">
        <?php
        echo development_mode ?
            "<script src='https://cdn.tailwindcss.com'></script>":
            "<link rel='stylesheet' href='./static/css/output.css'>";
        ?>
        <script src="https://unpkg.com/lucide@latest"></script>
        <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    </head>
    <body>
<?php } ?>
<?php
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
?>
<?php if(!isset($_SERVER['HTTP_CONTENT_TYPE']) && !str_contains($_SERVER['REQUEST_URI'], "api")) { ?>
        <script>
            lucide.createIcons();
        </script>
    <script src="/static/javascript/core.js"></script>
    </body>
</html>
<?php } ?>