<?php
namespace src\controllers\vehicle;

use _lib\router\Controller;
use _lib\router\Router;
use _lib\router\RouterCall;

class VehicleController implements Controller {
    private \VehicleRepository $repository;

    public function __construct(\VehicleRepository $repository)
    {
        $this->repository = $repository;
    }

    function update(RouterCall $call): void {

    }

    function routes(Router $router): void
    {
        // TODO: Implement routes() method.
    }
}