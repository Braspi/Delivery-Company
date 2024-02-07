<?php

namespace src\controllers\employees;

use _lib\router\Controller;
use _lib\router\RouterCall;
use AuthGuard;
use EmployeeRepository;
use src\controllers\employees\dto\CreateEmployeeDto;

include_once 'dto/create.dto.php';

class EmployeeController implements Controller
{
    private EmployeeRepository $employeeRepository;

    public function __construct(EmployeeRepository $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    function addEmployee(RouterCall $call)
    {
        $dto = $call->validatedBody(new CreateEmployeeDto());
        $isCreated = $this->employeeRepository->create($dto);
        if (!$isCreated) {
            $call->status(400)->json(basicResponse("Nie można dodać pracownika!"));
            return;
        }
        $call->status(201)->json(basicResponse("Pracownik został dodany", true));
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

    function routes($router): void
    {
        $router->post("/api/employees", fn($call) => $this->addEmployee($call), new AuthGuard());
        $router->delete("/api/employees/:id", fn($call) => $this->delete($call), new AuthGuard());
        $router->get("/api/employees", fn($call) => $this->find($call));
    }
}