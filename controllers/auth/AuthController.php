<?php

use utils\router\Controller;
use utils\router\RouterCall;
use utils\validation\Validation;
include_once 'dto/login.dto.php';
include "common/utils/router/Controller.php";
include_once 'common/services/database.service.php';

class AuthController implements Controller {
    private DatabaseService $databaseService;

    public function __construct(){
        $this->databaseService = new DatabaseService();
    }

    function logIn(RouterCall $call): void{
        session_start();
        $dto = new LoginDto($call->body());
        $state = new Validation($dto);
        $state->execute($call);

        $user = $this->databaseService->query("SELECT id, login, password FROM accounts WHERE login = '" . $dto->login . "'");
        if (count($user) <= 0) {
            $call->status(401);
            $call->json(array(
                "success" => false,
                "message" => "Niepoprawne hasło lub login!"
            ));
            return;
        }
        if(password_verify($dto->password, $user[0]['password'])) {
            $call->json(array(
                "success" => true,
                "message" => ""
            ));
            $_SESSION['user_id'] = $user[0]['id'];
            $_SESSION['isLoggedIn'] = true;
            return;
        }
        $call->json(array(
            "success" => false,
            "message" => "Niepoprawne hasło lub login!"
        ));
    }

    function register(RouterCall $call): void {
        $dto = new RegisterDto($call->body());
        $state = new Validation($dto);
        $state->execute($call);
        
        $user = $this->databaseService->query("SELECT id, login, password FROM accounts WHERE login = '" . $dto->login . "'");
        if(count($user) <= 0) {
            $call-> status(409);
            $call->json(array(
                "success" => false,
                "message" => "Ten użytkownik już istnieje"
            ));
            return;
        }
        if($dto->password != $dto->repeatpass) {
            $call-> status(400);
            $call->json(array(
                "succes" => false,
                "message" => "Hasła nie są takie same"
            ));
            return;
        }

        $isCreated = $this->databaseService->execute(
            "INSERT INTO `accounts`(`login`, `password`, `registration_date`, `status`) VALUES (?,?,CURRENT_DATE(),'NOT_ACTIVE')",
            "ss",
            $dto->login, 
            password_hash($dto->password, PASSWORD_BCRYPT)
        );

        if(!$isCreated) {
            $call-> status(400);
            $call->json(array(
                "succes" => false,
                "message" => "Nie można storzyć użytkownika"
            ));
            return;
        }
        $call-> status(201);
        $call->json(array(
            "succes" => true,
            "message" => "Konto zostało stworzone"
        ));

    }

    function routes($router): void {
        $router->post("/api/auth/login", function ($call) { $this->logIn($call); });
    }
}