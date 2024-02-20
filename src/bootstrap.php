<?php
require 'vendor/autoload.php';

include_once "components/index.php";
include_once 'common/services/DatabaseService.php';
include_once 'common/repositories/index.php';
include_once '_lib/router/Router.php';
include_once '_lib/validation/validation.php';
include_once 'controllers/auth/AuthController.php';
include_once 'controllers/employees/EmployeeController.php';
include_once 'controllers/department/DepartmentController.php';
include_once 'common/guards/AuthGuard.php';
include_once '_lib/router/Component.php';
include_once '_lib/utils.php';
include_once '_lib/router/RouterCall.php';
include_once '_lib/Application.php';

use _lib\router\Router;
use _lib\router\RouterCall;
use Jenssegers\Blade\Blade;
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
    ->enableBladeEngine(function (Blade $blade) {
        define("gblade", $blade);
        $blade->composer("*", function ($view) {
            $view->with('user', 'chuje1212');
            $view->with("test", function ($a) {
                echo "ewrqre ".$a;
            });
        });
    })
    ->enableRouting(function (Router $router) {
        $router->get("/", view("login"));
        $router->get("/register", view("register"));

        $router->get("/dashboard", view("dashboard.index"), new AuthGuard());
        $router->get("/dashboard/employees", view("dashboard.employees"), new AuthGuard());
        $router->get("/dashboard/departments", function (RouterCall $call) {
//            $result = array();
//            foreach (departmentRepository->find() as $item) {
//                array_push($result, "")
//            }
            $call->render("dashboard.departments", array("departments" => departmentRepository->find()));
        }, new AuthGuard());
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


//    $router->get("/dashboard/vehicles", function (RouterCall $call) {
//        $vehicles = vehicleRepository->find();
//        $call->render("dashboard/vehicles", array("layout" => "dashboard", "vehicles" => $vehicles));
//    }, new AuthGuard());