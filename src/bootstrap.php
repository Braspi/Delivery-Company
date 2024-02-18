<?php
require 'vendor/autoload.php';

include_once 'common/services/DatabaseService.php';
include_once 'common/repositories/index.php';
include_once '_lib/router/Router.php';
include_once '_lib/validation/validation.php';
include_once 'controllers/auth/AuthController.php';
include_once 'controllers/employees/EmployeeController.php';
include_once 'controllers/department/DepartmentController.php';
include_once 'common/guards/AuthGuard.php';
include_once '_lib/utils.php';
include_once '_lib/router/RouterCall.php';
include_once '_lib/Application.php';

use _lib\router\Router;
use src\controllers\auth\AuthController;
use src\controllers\department\DepartmentController;
use src\controllers\employees\EmployeeController;
use function _lib\router\view;

$application = new Application();
const userRepository = new UserRepository();
const employeeRepository = new EmployeeRepository();
const departmentRepository = new DepartmentRepository();
const vehicleRepository = new VehicleRepository();

$application
    ->enableBladeEngine()
    ->routing(function (Router $router) {
        $router->get("/", view("login"));
        $router->get("/register", view("register"));

        $router->get("/dashboard", view("dashboard.index"), new AuthGuard());
        $router->get("/dashboard/employees", view("dashboard.employees"), new AuthGuard());
        $router->get("/dashboard/departments", view("dashboard.departments"), new AuthGuard());
        $router->get("/dashboard/status", view("dashboard.status"), new AuthGuard());
        $router->get("/dashboard/vehicles", view("dashboard.vehicles"), new AuthGuard());
        $router->get("/dashboard/couriers", view("dashboard.couriers"), new AuthGuard());
        $router->get("/dashboard/recipients", view("dashboard.recipients"), new AuthGuard());

        $router->controllers(
            new AuthController(userRepository),
            new EmployeeController(employeeRepository),
            new DepartmentController(departmentRepository)
        );

        $router->error(view("error", array("message" => "Not Found!")));
})->bootstrap();


//    $router->param("user", function () {
//        if (!isset($_SESSION["user_id"])) return null;
//        return userRepository->findById($_SESSION["user_id"]);
//    });
//    $router->get("/dashboard/vehicles", function (RouterCall $call) {
//        $vehicles = vehicleRepository->find();
//        $call->render("dashboard/vehicles", array("layout" => "dashboard", "vehicles" => $vehicles));
//    }, new AuthGuard());