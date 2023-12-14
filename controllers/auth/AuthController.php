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

    function routes($router): void {
        $router->post("/api/auth/login", function ($call) { $this->logIn($call); });
    }
}