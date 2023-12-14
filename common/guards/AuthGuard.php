<?php
include_once 'common/utils/router/HttpGuard.php';
use utils\router\HttpGuard;

class AuthGuard implements HttpGuard {
    function canActivate($call): bool {
        if (!isset($_SESSION['isLoggedIn'])) {
            $call->redirect("/");
            return false;
        }
        return true;
    }
}