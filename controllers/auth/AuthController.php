<?php

use utils\router\Controller;
use utils\router\RouterCall;
use utils\validation\Validation;
include_once 'dto/login.dto.php';
include_once 'dto/register.dto.php';
include "common/utils/router/Controller.php";
include_once 'common/services/database.service.php';

class AuthController implements Controller {
    private DatabaseService $databaseService;

    public function __construct(DatabaseService $databaseService){
        $this->databaseService = $databaseService;
    }

    function logIn(RouterCall $call): void{
        $dto = $call->validatedBody(new LoginDto());

        $user = $this->databaseService->query("SELECT id, login, password FROM accounts WHERE login = '" . $dto->login . "'");
        if (count($user) <= 0) {
            $call->status(401);
            $call->json(basicResponse("Niepoprawne hasło lub login!"));
            return;
        }
        if(password_verify($dto->password, $user[0]['password'])) {
            $call->json(basicResponse("", true));
            $_SESSION['user_id'] = $user[0]['id'];
            $_SESSION['isLoggedIn'] = true;
            return;
        }
        $call->json(basicResponse("Niepoprawne hasło lub login!"));
    }

    function register(RouterCall $call): void {
        $dto = $call->validatedBody(new RegisterDto());
        
        $user = $this->databaseService->query("SELECT id, login, password FROM accounts WHERE login = '" . $dto->login . "'");
        if(count($user) <= 0) {
            $call->status(409);
            $call->json(basicResponse("Ten użytkownik już istnieje"));
            return;
        }
        if($dto->password != $dto->repeatpass) {
            $call->status(400);
            $call->json(basicResponse("Hasła nie są takie same"));
            return;
        }

        $isCreated = $this->databaseService->execute(
            "INSERT INTO `accounts`(`login`, `password`, `registration_date`, `status`) VALUES (?,?,CURRENT_DATE(),'NOT_ACTIVE')",
            "ss",
            $dto->login, password_hash($dto->password, PASSWORD_BCRYPT)
        );

        if(!$isCreated) {
            $call-> status(400);
            $call->json(basicResponse("Nie można storzyć użytkownika"));
            return;
        }
        $call-> status(201);
        $call->json(basicResponse("Konto zostało stworzone", true));
    }

    function routes($router): void {
        $router->post("/api/auth/login", fn($call) => $this->logIn($call));
        $router->post("/api/auth/register", fn($call) => $this->register($call));
    }
}