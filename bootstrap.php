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

session_start();
$router = new Router();

const userRepository = new UserRepository();
const employeeRepository = new EmployeeRepository();
const departmentRepository = new DepartmentRepository();

$router->param("user", function () {
    if (!isset($_SESSION["user_id"])) return null;
    return userRepository->findById($_SESSION["user_id"]);
});

$router->get("/dashboard", view("dashboard/index", array("layout" => "dashboard")), new AuthGuard());
$router->get("/dashboard/employees", view("dashboard/employees", array("layout" => "dashboard")), new AuthGuard());
$router->get("/dashboard/departments", view("dashboard/departments", array("layout" => "dashboard")), new AuthGuard());
$router->get("/dashboard/status", view("dashboard/status", array("layout" => "dashboard")), new AuthGuard());
$router->get("/dashboard/vehicles", view("dashboard/vehicles", array("layout" => "dashboard")), new AuthGuard());
$router->get("/dashboard/couriers", view("dashboard/couriers", array("layout" => "dashboard")), new AuthGuard());

$router->get("/", view("login"));
$router->get("/register", view("register"));

$router->controllers(
    new AuthController(userRepository),
    new EmployeeController(employeeRepository),
    new DepartmentController(departmentRepository)
);

$router->error(view("error", array("message" => "Not Found!")));

try {
    $router->matchRoute();
} catch (Exception $e) {
    die($e->getMessage());
}