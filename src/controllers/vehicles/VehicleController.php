<?php
namespace src\controllers\vehicle;

use _lib\router\Controller;
use _lib\router\Router;
use _lib\router\RouterCall;
use AuthGuard;
use Project\DeliveryCompany\controllers\vehicles\dto\CreateVehicleDto;
use VehicleRepository;

readonly class VehicleController implements Controller {
    public function __construct(
        private VehicleRepository $repository
    ) {}

    function create(RouterCall $call): void {
        $dto = $call->validatedBody(new CreateVehicleDto());
        $isCreated = $this->repository->create($dto);
        if (!$isCreated) {
            $call->status(400)->json(basicResponse("Nie można dodać pojazdu!"));
            return;
        }
        $call->status(201)->json(basicResponse("Pojazd został dodany", true));
    }
    function update(RouterCall $call): void {
        $id = intval($call->pathParam("id"));
        $vehicle = $this->repository->findById($id);
        if ($vehicle == null) {
            $call->status(404)->json(basicResponse("Vehicle not found!"));
            return;
        }
        $dto = $call->validatedBody(new UpdateVehicleDto());
        $state = $this->repository->update($dto, $id);
        $call->json(basicResponse("", $state));
    }
    function delete(RouterCall $call): void
    {
        $id = intval($call->pathParam("id"));
        $state = $this->repository->delete($id);
        if (!$state) {
            $call->status(400)->json(basicResponse("Ten pojazd nie istnieje!"));
            return;
        }
        $call->json(basicResponse("OK", true));
    }
    function findById(RouterCall $call): void {
        header('Content-Type: application/json; charset=utf-8');
        $id = intval($call->pathParam("id"));
        $call->json(
            $this->repository->findById($id)
        );
    }

    function routes(Router $router): void
    {
        $router->get("/api/vehicles/:id", fn($call) => $this->findById($call));
        $router->post("/api/vehicles", fn($call) => $this->create($call), new AuthGuard());
        $router->delete("/api/vehicles/:id", fn($call) => $this->delete($call), new AuthGuard());
        $router->put("/api/vehicles/:id", fn($call) => $this->update($call), new AuthGuard());
    }
}