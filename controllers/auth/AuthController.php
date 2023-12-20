<?php

use utils\router\Controller;
use utils\router\RouterCall;

include_once 'dto/login.dto.php';
include_once 'dto/register.dto.php';
include "common/utils/router/Controller.php";

class AuthController implements Controller {
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository){
        $this->userRepository = $userRepository;
    }

    function logIn(RouterCall $call): void{
        $dto = $call->validatedBody(new LoginDto());
        $user = $this->userRepository->findByLogin($dto->login);

        if ($user == null) {
            $call->status(401)->json(basicResponse("Niepoprawne hasło lub login!"));
            return;
        }
        if(!password_verify($dto->password, $user['password'])) {
            $call->json(basicResponse("Niepoprawne hasło lub login!"));
            return;
        }
        if($user['status'] != 'ACTIVE') {
            $call->status(400)->json(basicResponse("Twoje konto nie jest aktywne!"));
            return;
        }
        $call->json(basicResponse("", true));
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['isLoggedIn'] = true;
    }

    function register(RouterCall $call): void {
        $dto = $call->validatedBody(new RegisterDto());
        $user = $this->userRepository->findByLogin($dto->login);

        if($user != null) {
            $call->status(409)->json(basicResponse("Ten użytkownik już istnieje"));
            return;
        }
        $isCreated = $this->userRepository->create($dto->login, password_hash($dto->password, PASSWORD_BCRYPT));
        if(!$isCreated) {
            $call->status(400)->json(basicResponse("Nie można storzyć użytkownika"));
            return;
        }
        $call->status(201)->json(basicResponse("Konto zostało stworzone", true));
    }

    function routes($router): void {
        $router->post("/api/auth/login", fn($call) => $this->logIn($call));
        $router->post("/api/auth/register", fn($call) => $this->register($call));
    }
}