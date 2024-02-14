<?php

namespace src\controllers\employees;

use _lib\router\Controller;
use _lib\router\RouterCall;
use AuthGuard;
use EmployeeRepository;
use src\controllers\employees\dto\CreateEmployeeDto;
use src\controllers\employees\dto\UpdateEmployeeDto;

include_once 'dto/create.dto.php';
include_once 'dto/update.dto.php';

class EmployeeController implements Controller
{
    private EmployeeRepository $employeeRepository;

    public function __construct(EmployeeRepository $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

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
    function update(RouterCall $call): void {
        $dto = $call->validatedBody(new UpdateEmployeeDto());
        $id = intval($call->pathParam("id"));
        $state = $this->employeeRepository->update($dto, $id);
        $call->json($state);
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