<?php
function isLoggedIn(): bool {
    return $_SESSION['isLoggedIn'];
}
function saveSession(int $user_id) {
    $_SESSION['user_id'] = $user_id;
    $_SESSION['isLoggedIn'] = true;
}