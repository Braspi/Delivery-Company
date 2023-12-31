<?php

use utils\router\Controller;
use utils\router\RouterCall;

include_once 'dto/create.dto.php';

class EmployeeController implements Controller {
    private EmployeeRepository $employeeRepository;

    public function __construct(EmployeeRepository $employeeRepository){
        $this->employeeRepository = $employeeRepository;
    }

    function addEmployee(RouterCall $call){
        $dto = $call->validatedBody(new CreateEmployeeDto());
        $isCreated = $this->employeeRepository->create($dto);
        if(!$isCreated) {
            $call->status(400)->json(basicResponse("Nie można dodać pracownika!"));
            return;
        }
        $call->status(201)->json(basicResponse("Pracownik został dodany", true));
    }

    function routes($router): void {
        $router->post("/api/employees", fn($call) => $this->addEmployee($call), new AuthGuard());
    }
}