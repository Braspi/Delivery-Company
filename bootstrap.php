<?php
include "common/utils/router/router.php";
use utils\router\Router;
use utils\router\RouterCall;
use utils\validation\Validation;

include "common/services/database.service.php";
include "common/utils/validation/index.php";
include "common/dto/login.dto.php";

const databaseService = new DatabaseService();

$router = new Router();

$router->route('GET', "/", function (RouterCall $call) {
    $call->render("login");
});

$router->route('GET', "/dashboard", function (RouterCall $call) {
    $call->render("dashboard/index");
});

$router->route("POST", "/api/auth/login", function ($call) {
    $dto = new LoginDto($call->body());
    $state = new Validation($dto);
    $state->execute($call);

    $user = databaseService->query("SELECT id, login, password FROM accounts WHERE login = '" . $dto->login . "'");
    if (count($user) <= 0) {
        $call->status(401);
        $call->json(array(
            "success" => false,
            "message" => "Niepoprawne hasło lub login!"
        ));
        return;
    }
    if(password_verify($dto->password, $user[0]['password'])) {
        $call->json(array(
            "success" => true,
            "message" => ""
        ));
        //Zapisywanie sesji
        return;
    }
    $call->json(array(
        "success" => false,
        "message" => "Niepoprawne hasło lub login!"
    ));
});

$router->error(function ($call) {
    $call->render("error");
});

try {
    $router->matchRoute();
} catch (Exception $e) {
    die($e->getMessage());
}