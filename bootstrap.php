<?php
include_once 'common/utils/router/Router.php';
include_once 'common/utils/router/RouterCall.php';
include_once 'common/utils/validation/validation.php';
include_once 'controllers/auth/AuthController.php';

use utils\router\Router;
use utils\router\RouterCall;

$router = new Router();

$router->get("/", function (RouterCall $call) {
    $call->render("login");
});

$router->get("/dashboard", function (RouterCall $call) {
    $call->render("dashboard/index");
});

$router->route('GET', "/register", function (RouterCall $call) {
    $call->render("register");
});

$router->controllers(
    new AuthController()
);

$router->error(function ($call) {
    $call->render("error");
});

try {
    $router->matchRoute();
} catch (Exception $e) {
    die($e->getMessage());
}