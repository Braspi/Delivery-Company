<?php 

use utils\router\Controller;
use utils\router\RouterCall;

include_once 'dto/create.dto.php';
include_once 'dto/update.dto.php';

class DepartmentController implements Controller {
    private DepartmentRepository $departmentRepository;

    public function __construct(DepartmentRepository $departmentRepository){
        $this->departmentRepository = $departmentRepository;
    }

    function create(RouterCall $call): void
    {
        $dto = $call->validatedBody(new CreateDepartmentDto());
        $isCreated = $this->departmentRepository->create($dto);
        if(!$isCreated) {
            $call->status(400)->json(basicResponse("Nie można dodać oddziału!"));
            return;
        }
        $call->status(201)->end();
    }
    function delete(RouterCall $call): void{
        $departmentId = intval($call->pathParam("id"));
        $department = $this->departmentRepository->findById($departmentId);
        if ($department == null) {
            $call->status(404)->json(basicResponse("Department not found!"));
            return;
        }
        $call->json($department);
    }
    function update(RouterCall $call) : void {
        $departmentId = intval($call->pathParam("id"));
        $department = $this->departmentRepository->findById($departmentId);
        if ($department == null) {
            $call->status(404)->json(basicResponse("Department not found!"));
            return;
        }
        $dto = $call->validatedBody(new UpdateDepartmentDto());
        $call->json($dto);
    }

    function find(RouterCall $call): void{
        $call->json(
            $this->departmentRepository->find()
        );
    }


    function routes($router): void {
        $router->post("/api/departments", fn($call) => $this->create($call), new AuthGuard());
        $router->put("/api/departments/:id", fn($call) => $this->update($call), new AuthGuard());
        $router->delete("/api/departments/:id", fn($call) => $this->delete($call), new AuthGuard());
        $router->get("/api/departments", fn($call) => $this->find($call));
    }
}