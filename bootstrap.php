<?php
include_once 'common/services/database.service.php';
include_once 'common/repositories/index.php';
include_once 'common/utils/router/Router.php';
include_once 'common/utils/validation/validation.php';
include_once 'controllers/auth/AuthController.php';
include_once 'controllers/employees/EmployeeController.php';
include_once 'controllers/department/DepartmentController.php';
include_once 'common/guards/AuthGuard.php';
include_once 'common/utils/utils.php';

use utils\router\Router;
use function utils\router\view;
use utils\router\RouterCall;

session_start();
$router = new Router();

$databaseService = new DatabaseService();
const userRepository = new UserRepository();
const employeeRepository = new EmployeeRepository();
const departmentRepository = new DepartmentRepository();

$router->get("/dashboard", function(RouterCall $call) {
    $user = userRepository->findById($_SESSION["user_id"]);
    $call->render("dashboard/index", array("user" => $user));
}, new AuthGuard());

$router->get("/dashboard/employees", function(RouterCall $call) {
    $user = userRepository->findById($_SESSION["user_id"]);
    $call->render("dashboard/employees", array("user" => $user));
}, new AuthGuard());

$router->get("/dashboard/departments", function(RouterCall $call) {
    $user = userRepository->findById($_SESSION["user_id"]);
    $call->render("dashboard/departments", array("user" => $user));
}, new AuthGuard());

$router->get("/dashboard/status", function(RouterCall $call) {
    $user = userRepository->findById($_SESSION["user_id"]);
    $call->render("dashboard/status", array("user" => $user));
}, new AuthGuard());

$router->get("/dashboard/vehicles", function(RouterCall $call) {
    $user = userRepository->findById($_SESSION["user_id"]);
    $call->render("dashboard/vehicles", array("user" => $user));
}, new AuthGuard());

$router->get("/dashboard/couriers", function(RouterCall $call) {
    $user = userRepository->findById($_SESSION["user_id"]);
    $call->render("dashboard/couriers", array("user" => $user));
}, new AuthGuard());

$router->get("/", view("login"));
$router->get("/register", view("register"));

$router->controllers(
    new AuthController(userRepository),
    new EmployeeController(employeeRepository),
    new DepartmentController(departmentRepository)
);

$router->error(
    view("error", array("message" => "Not Found!"))
);

try {
    $router->matchRoute();
} catch (Exception $e) {
    die($e->getMessage());
}