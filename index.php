<?php include "config.php"; ?>
<?php if(!isset($_SERVER['HTTP_CONTENT_TYPE'])) { ?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Dashboard</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
        <?php
        echo development_mode ?
            "<script src='https://cdn.tailwindcss.com'></script>":
            "<link rel='stylesheet' href='./static/css/output.css'>";
        ?>
        <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    </head>
<?php } ?>
<?php require_once 'bootstrap.php' ?>