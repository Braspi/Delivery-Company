<?php
if(!isset($_POST['login']) || !isset($_POST['password'])) {
    die("Bad Request");
}

$login = $_POST['login'];
$password = $_POST['password'];

$connection = mysqli_connect("localhost", "root", null, "firma_kurierska");
$user_login = mysqli_real_escape_string($connection, trim($login));
$user_pass =  mysqli_real_escape_string($connection, trim($password));
$hashed= password_hash($user_pass, PASSWORD_BCRYPT);

$query = mysqli_prepare($connection, "INSERT INTO `accounts`(`login`, `password`, `registration_date`, `status`) VALUES (?,?,CURRENT_DATE(),'NOT_ACTIVE')");
mysqli_stmt_bind_param($query, 'ss', $user_login, $hashed);
mysqli_stmt_execute($query);

if(mysqli_stmt_affected_rows($query) == 1) {
    echo "Zarejestrowano";
} else {
    echo 'Blad!';
}

