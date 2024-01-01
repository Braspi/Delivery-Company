<?php 

use utils\router\Controller;
use utils\router\RouterCall;

include_once 'dto/create.dto.php';

class DepartmentController implements Controller {
    private DepartmentRepository $departmentRepository;

    public function __construct(DepartmentRepository $departmentRepository){
        $this->departmentRepository = $departmentRepository;
    }

    function addDepartment(RouterCall $call){
        $dto = $call->validatedBody(new CreateDepartmentDto());
        $isCreated = $this->departmentRepository->create($dto);
        if(!$isCreated) {
            $call->status(400)->json(basicResponse("Nie można dodać oddziału!"));
            return;
        }
        $call->status(201)->json(basicResponse("Oddział został dodany", true));
    }

    function routes($router): void {
        $router->post("/api/department", fn($call) => $this->addDepartment($call), new AuthGuard());
    }
}