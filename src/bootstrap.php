<?php
require 'vendor/autoload.php';

include_once "components/index.php";
include_once 'repositories/index.php';
include_once '_lib/router/Router.php';
include_once '_lib/router/Component.php';
include_once '_lib/utils.php';
include_once '_lib/router/RouterCall.php';
include_once '_lib/Application.php';
include_once 'controllers/index.php';
include_once 'guards/AuthGuard.php';

use _lib\router\Router;
use _lib\router\RouterCall;
use Jenssegers\Blade\Blade;
use Project\DeliveryCompany\controllers\auth\AuthController;
use Project\DeliveryCompany\controllers\department\DepartmentController;
use Project\DeliveryCompany\controllers\employees\EmployeeController;
use Project\DeliveryCompany\guards\AuthGuard;
use Project\DeliveryCompany\repositories\DepartmentRepository;
use Project\DeliveryCompany\repositories\EmployeeRepository;
use Project\DeliveryCompany\repositories\UserRepository;
use Project\DeliveryCompany\repositories\VehicleRepository;
use src\controllers\vehicle\VehicleController;
use function _lib\router\redirect;
use function _lib\router\view;

(new Application())
    ->enableDatabase(database, function () {
        define("userRepository", new UserRepository());
        define("employeeRepository", new EmployeeRepository());
        define("departmentRepository", new DepartmentRepository());
        define("vehicleRepository", new VehicleRepository());
    })
    ->enableValidation()
    ->enableBladeEngine(function (Blade $blade) {
        define("gblade", $blade);
    })
    ->enableRouting(function (Router $router) {
        $router->get("/", function (RouterCall $call) {
            if ($call->isLoggedIn()) $call->redirect('/dashboard');
            $call->render("login");
        });
        $router->get("/register", view("register"));

        $router->get("/dashboard", redirect("/dashboard/couriers"), new AuthGuard());
        $router->get("/dashboard/couriers", view("dashboard.couriers", array("couriers" => employeeRepository->find())), new AuthGuard());
        $router->get("/dashboard/departments", view("dashboard.departments", array("departments" => departmentRepository->find())), new AuthGuard());
        $router->get("/dashboard/vehicles", view("dashboard.vehicles", array("vehicles" => vehicleRepository->find())), new AuthGuard());
        $router->get("/dashboard/status", view("dashboard.status"), new AuthGuard());
        $router->get("/dashboard/recipients", view("dashboard.recipients"), new AuthGuard());

        $router->controllers(
            new AuthController(userRepository),
            new EmployeeController(employeeRepository),
            new DepartmentController(departmentRepository),
            new VehicleController(vehicleRepository)
        );

        $router->error(view("error", array("message" => "Not Found!")));
})->bootstrap();