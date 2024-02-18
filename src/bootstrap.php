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
include_once '_lib/Application.php';

use _lib\router\Router;
use _lib\router\RouterCall;
use src\controllers\auth\AuthController;
use src\controllers\department\DepartmentController;
use src\controllers\employees\EmployeeController;
//use function _lib\router\view;
use Jenssegers\Blade\Blade;

$app = new Application();
const userRepository = new UserRepository();
const employeeRepository = new EmployeeRepository();
const departmentRepository = new DepartmentRepository();
const vehicleRepository = new VehicleRepository();

const blade = new Blade("views", "cache");

$app->routing(function (Router $router) {
    $router->get("/test", function (RouterCall $call) {
        echo blade->render("homepage");
    });

    $router->param("user", function () {
        if (!isset($_SESSION["user_id"])) return null;
        return userRepository->findById($_SESSION["user_id"]);
    });

//    $router->get("/dashboard", view("dashboard/index", array("layout" => "dashboard")), new AuthGuard());
    $router->get("/dashboard", function (RouterCall $call) {
        echo blade->render("dashboard.index");
    }, new AuthGuard());
    $router->get("/dashboard/employees", function (RouterCall $call) {
        echo blade->render("dashboard.employees");
    }, new AuthGuard());
    $router->get("/dashboard/departments", function (RouterCall $call) {
        echo blade->render("dashboard.departments");
    }, new AuthGuard());
    $router->get("/dashboard/status", function (RouterCall $call) {
        echo blade->render("dashboard.status");
    }, new AuthGuard());
    //$router->get("/dashboard/employees", view("dashboard/employees", array("layout" => "dashboard")), new AuthGuard());
    //$router->get("/dashboard/departments", view("dashboard/departments", array("layout" => "dashboard")), new AuthGuard());
//    $router->get("/dashboard/status", view("dashboard/status", array("layout" => "dashboard")), new AuthGuard());
//    $router->get("/dashboard/vehicles", view("dashboard/vehicles", array("layout" => "dashboard")), new AuthGuard());

    $router->get("/dashboard/vehicles", function (RouterCall $call) {
        $vehicles = vehicleRepository->find();
        $call->render("dashboard/vehicles", array("layout" => "dashboard", "vehicles" => $vehicles));
    }, new AuthGuard());

//    $router->get("/dashboard/couriers", view("dashboard/couriers", array("layout" => "dashboard")), new AuthGuard());
//    $router->get("/dashboard/recipients", view("dashboard/recipients", array("layout" => "dashboard")), new AuthGuard());

    $router->get("/", function ($call){
        echo blade->render("login");
    });
//    $router->get("/register", view("register"));

    $router->controllers(
        new AuthController(userRepository),
        new EmployeeController(employeeRepository),
        new DepartmentController(departmentRepository)
    );

//    $router->error(view("error", array("message" => "Not Found!")));
})->bootstrap();