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
include_once 'controllers/vehicles/VehicleController.php';
include_once 'common/guards/AuthGuard.php';
include_once '_lib/router/Component.php';
include_once '_lib/utils.php';
include_once '_lib/router/RouterCall.php';
include_once '_lib/Application.php';

use _lib\router\Router;
use _lib\router\RouterCall;
use Jenssegers\Blade\Blade;
use Project\DeliveryCompany\controllers\auth\AuthController;
use Project\DeliveryCompany\controllers\department\DepartmentController;
use Project\DeliveryCompany\controllers\employees\EmployeeController;
use src\controllers\vehicle\VehicleController;
use function _lib\router\redirect;
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
            if (isset($_SESSION['user_id'])) {
                $user = userRepository->findById($_SESSION['user_id']);
                if ($user != null) $view->with('user', $user);
            }
            $view->with("test", function ($a) {
                echo "ewrqre ".$a;
            });
        });
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