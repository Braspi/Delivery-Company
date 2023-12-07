<?php
include 'router.php';

get('/login', view("login"));
get('/404', view('error'));

function view($name) {
    return "/views/{$name}.view.php";
}