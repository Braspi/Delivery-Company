<?php
include_once 'common/utils/router/HttpGuard.php';
use utils\router\HttpGuard;

class AuthGuard implements HttpGuard {
    function canActivate($call): bool {
        if (!isset($_SESSION['isLoggedIn'])) {
            if (isset($_SERVER['HTTP_CONTENT_TYPE']) && $_SERVER['HTTP_CONTENT_TYPE'] == 'application/json') {
                $call->status(401)->json(array(
                    "success" => false,
                    "message" => "Unauthorized"
                ));
                return false;
            }
            $call->redirect("/");
            return false;
        }
        return true;
    }
}