<?php
include 'router.php';

$router = new Router();

$router->route('GET', "/test/:text", function ($res, $text) {
//    print_r($res->headers());
//    $res->respondWithCode("<br>e $text", 201);
    $res->render("login");
});
$router->route('GET', "/test2", function () {
    echo "testowa sciezka 2";
    http_response_code(201);
    exit(200);
});

$router->error(function ($res) {
    $res->render("error");
});

try {
    $router->matchRoute();
} catch (Exception $e) {
    die($e->getMessage());
}