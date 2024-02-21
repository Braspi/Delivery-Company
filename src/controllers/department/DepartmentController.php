<?php

namespace Project\DeliveryCompany\controllers\department;

use _lib\router\Controller;
use _lib\router\RouterCall;
use Project\DeliveryCompany\controllers\department\dto\CreateDepartmentDto;
use Project\DeliveryCompany\controllers\department\dto\UpdateDepartmentDto;
use Project\DeliveryCompany\guards\AuthGuard;
use Project\DeliveryCompany\repositories\DepartmentRepository;

readonly class DepartmentController implements Controller {
    public function __construct(
        private DepartmentRepository $departmentRepository
    ) {}

    function create(RouterCall $call): void
    {
        $dto = $call->validatedBody(new CreateDepartmentDto());
        $isCreated = $this->departmentRepository->create($dto);
        if (!$isCreated) {
            $call->status(400)->json(basicResponse("Nie można dodać oddziału!"));
            return;
        }
        $call->status(201)->end();
    }

    function delete(RouterCall $call): void
    {
        $departmentId = intval($call->pathParam("id"));
        if (!$departmentId) {
            $call->status(400)->json(basicResponse("Nie można usunac tego odziału!"));
            return;
        }
        $state = $this->departmentRepository->delete($departmentId);
        $call->json(basicResponse("", $state));
    }

    function update(RouterCall $call): void
    {
        $departmentId = intval($call->pathParam("id"));
        $department = $this->departmentRepository->findById($departmentId);
        if ($department == null) {
            $call->status(404)->json(basicResponse("Department not found!"));
            return;
        }
        $dto = $call->validatedBody(new UpdateDepartmentDto());
        $state = $this->departmentRepository->update($dto, $departmentId);
        $call->json(basicResponse("", $state));
    }

    function find(RouterCall $call): void
    {
        header('Content-Type: application/json; charset=utf-8');
        $call->json(
            $this->departmentRepository->find()
        );
    }
    function findById(RouterCall $call): void
    {
        header('Content-Type: application/json; charset=utf-8');
        $departmentId = intval($call->pathParam("id"));
        $call->json(
            $this->departmentRepository->findById($departmentId)
        );
    }


    function routes($router): void
    {
        $router->post("/api/departments", fn($call) => $this->create($call), new AuthGuard());
        $router->put("/api/departments/:id", fn($call) => $this->update($call), new AuthGuard());
        $router->delete("/api/departments/:id", fn($call) => $this->delete($call), new AuthGuard());
        $router->get("/api/departments", fn($call) => $this->find($call));
        $router->get("/api/departments/:id", fn($call) => $this->findById($call));
    }
}