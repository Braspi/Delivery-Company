<?php
include 'router.php';
include "services/database.service.php";
include "config.php";
include "dto/index.php";

const databaseService = new DatabaseService();

$router = new Router();

$router->route('GET', "/", function ($res) {
    $res->render("login");
});

$router->route("POST", "/api/auth/login", function ($res) {
    $dto = new LoginDto($res->body());
    $state = new Validation($dto);
    $state->execute($res);

    $user = databaseService->query("SELECT id, login, password FROM accounts WHERE login = '" . $dto->login . "'");
    if (count($user) <= 0) {
        $res->status(401);
        $res->json(array(
            "success" => false,
            "message" => "Niepoprawne hasło lub login!"
        ));
        return;
    }
    if(password_verify($dto->password, $user[0]['password'])) {
        $res->json(array(
            "success" => true,
            "message" => ""
        ));
        //Zapisywanie sesji
        return;
    }
    $res->json(array(
        "success" => false,
        "message" => "Niepoprawne hasło lub login!"
    ));
});

$router->error(function ($res) {
    $res->render("error");
});

try {
    $router->matchRoute();
} catch (Exception $e) {
    die($e->getMessage());
}