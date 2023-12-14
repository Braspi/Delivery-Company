<?php include "config.php"; ?>
<?php if(!isset($_SERVER['HTTP_CONTENT_TYPE']) || $_SERVER['HTTP_CONTENT_TYPE'] != 'application/json') { ?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Dashboard</title>
        <?php
        echo development_mode ?
            "<script src='https://cdn.tailwindcss.com'></script>":
            "<link rel='stylesheet' href='./static/css/output.css'>";
        ?>
        <script src="https://unpkg.com/lucide@latest"></script>
    </head>
<?php } ?>
<?php require_once 'bootstrap.php' ?>