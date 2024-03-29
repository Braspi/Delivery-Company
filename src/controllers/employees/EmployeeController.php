<?php

namespace Project\DeliveryCompany\controllers\employees;

use _lib\router\Controller;
use _lib\router\RouterCall;
use Project\DeliveryCompany\controllers\employees\dto\CreateEmployeeDto;
use Project\DeliveryCompany\controllers\employees\dto\UpdateEmployeeDto;
use Project\DeliveryCompany\guards\AuthGuard;
use Project\DeliveryCompany\repositories\EmployeeRepository;

readonly class EmployeeController implements Controller {
    public function __construct(
        private EmployeeRepository $employeeRepository
    ){}

    function addEmployee(RouterCall $call): void
    {
        $dto = $call->validatedBody(new CreateEmployeeDto());
        $isCreated = $this->employeeRepository->create($dto);
        if (!$isCreated) {
            $call->status(400)->json(basicResponse("Nie można dodać pracownika!"));
            return;
        }
        $call->status(201)->json(basicResponse("Pracownik został dodany", true));
    }

    function update(RouterCall $call): void
    {
        $courierId = intval($call->pathParam("id"));
        $courier = $this->employeeRepository->findById($courierId);
        if ($courier == null) {
            $call->status(404)->json(basicResponse("Courier not found!"));
            return;
        }
        $dto = $call->validatedBody(new UpdateEmployeeDto());
        $state = $this->employeeRepository->update($dto, $courierId);
        $call->json(basicResponse("", $state));
    }
    function delete(RouterCall $call): void
    {
        $id = intval($call->pathParam("id"));
        $state = $this->employeeRepository->delete($id);
        if (!$state) {
            $call->status(400)->json(basicResponse("Ten pracownik nie istnieje!"));
            return;
        }
        $call->json(basicResponse("OK", true));
    }

    function find(RouterCall $call): void
    {
        header('Content-Type: application/json; charset=utf-8');
        $call->json(
            $this->employeeRepository->find()
        );
    }
    function findById(RouterCall $call): void {
        header('Content-Type: application/json; charset=utf-8');
        $id = intval($call->pathParam("id"));
        $call->json(
            $this->employeeRepository->findById($id)
        );
    }

    function routes($router): void
    {
        $router->post("/api/employees", fn($call) => $this->addEmployee($call), new AuthGuard());
        $router->delete("/api/employees/:id", fn($call) => $this->delete($call), new AuthGuard());
        $router->get("/api/employees", fn($call) => $this->find($call));
        $router->get("/api/employees/:id", fn($call) => $this->findById($call));
        $router->put("/api/employees/:id", fn($call) => $this->update($call), new AuthGuard());
    }
}