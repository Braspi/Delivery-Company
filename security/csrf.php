<?php
session_start();
function createCsrfInput() {
    if(isset($_SESSION['csrf']))
        echo "<input type='hidden' name='csrf' value='{$_SESSION['csrf']}'>";
}
function createCsrfToken() {
    if(!isset($_SESSION['csrf'])) {
        $_SESSION['csrf'] = bin2hex(random_bytes(32));
    }
}
function destroyCsrfToken() {
    unset($_SESSION['csrf']);
}
function validateCsrfToken(){
    if(!isset($_POST['csrf']) || !hash_equals($_SESSION['csrf'], $_POST['csrf'])) {
        die('Invalid CSRF token in request!');
    }
}
?>

