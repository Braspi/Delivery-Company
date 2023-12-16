<?php
include_once 'common/services/database.service.php';
include_once 'common/repositories/index.php';
include_once 'common/utils/router/Router.php';
include_once 'common/utils/validation/validation.php';
include_once 'controllers/auth/AuthController.php';
include_once 'common/guards/AuthGuard.php';
include_once 'common/utils/utils.php';

use utils\router\Router;
use utils\router\RouterCall;

session_start();
$router = new Router();

$databaseService = new DatabaseService();
$userRepository = new UserRepository();

$router->get("/", fn(RouterCall $call) => $call->render("login"));
$router->get("/register", fn(RouterCall $call) => $call->render("register"));
$router->get("/dashboard", fn(RouterCall $call) => $call->render("dashboard/index"), new AuthGuard());

$router->controllers(
    new AuthController($userRepository)
);

$router->error(function ($call) {
    $call->render("error", array(
        "message" => "Not Found!",
        "stacktrace" => ""
    ));
});

try {
    $router->matchRoute();
} catch (Exception $e) {
    die($e->getMessage());
}