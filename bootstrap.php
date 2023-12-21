<?php
include_once 'common/services/database.service.php';
include_once 'common/repositories/index.php';
include_once 'common/utils/router/Router.php';
include_once 'common/utils/validation/validation.php';
include_once 'controllers/auth/AuthController.php';
include_once 'common/guards/AuthGuard.php';
include_once 'common/utils/utils.php';

use utils\router\Router;
use function utils\router\view;

session_start();
$router = new Router();

$databaseService = new DatabaseService();
$userRepository = new UserRepository();

$router->get("/", view("login"));
$router->get("/register", view("register"));
$router->get("/dashboard", view("dashboard/index"), new AuthGuard());

$router->controllers(
    new AuthController($userRepository)
);

$router->error(
    view("error", array("message" => "Not Found!"))
);

try {
    $router->matchRoute();
} catch (Exception $e) {
    die($e->getMessage());
}