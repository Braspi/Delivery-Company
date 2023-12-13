<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <?php
    include "config.php.template";
    echo development_mode ?
        "<script src='https://cdn.tailwindcss.com'></script>":
        "<link rel='stylesheet' href='./static/css/output.css'>";
    ?>
</head>
<body>
<?php require 'bootstrap.php' ?>
</body>