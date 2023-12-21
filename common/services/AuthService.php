<?php
class AuthService {
    function logIn(int $user_id): void{
        $_SESSION['user_id'] = $user_id;
        $_SESSION['isLoggedIn'] = true;
    }
    function logOut(): void{
        if (isset($_SESSION['isLoggedIn']))
            unset($_SESSION['isLoggedIn']);
    }
    function getUserId(): ?int {
        return $_SESSION['user_id'] ?? null;
    }
}