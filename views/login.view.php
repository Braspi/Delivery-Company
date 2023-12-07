<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    include 'security/csrf.php';
    include 'security/auth.php';

    createCsrfToken();
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        validateCsrfToken();
        if(!isset($_POST['login']) || !isset($_POST['password'])) {
            die("Bad Request");
        }
        $connection = mysqli_connect("localhost", "root", null, "firma_kurierska");
        $query = mysqli_prepare($connection, "SELECT id, login, password FROM accounts WHERE login = ?");
        mysqli_stmt_bind_param($query, 's', $_POST['login']);
        mysqli_stmt_execute($query);
        mysqli_stmt_bind_result($query, $user_id, $login, $user_password);
        mysqli_stmt_fetch($query);

        if(password_verify($_POST['password'], $user_password)) {
            echo "Zalogowano!";
            saveSession($user_id);
            header("Location: dashboard");
        } else {
            echo "Niepoprawne hasło lub nazwa użytkownika!";
        }
        destroyCsrfToken();
        createCsrfToken();
    }
    ?>
</head>
<body>
<div class="flex flex-col justify-center items-center h-screen">
    <section class="flex-col">
        <h1>Zaloguj sie aby kontynuować</h1>
        <form action="register.php" method="POST">
            <input type="text" name="login" required placeholder="Login" class="border border-slate-300 w-24 h-12 text-center rounded-lg">
            <input type="password" name="password" required placeholder="Hasło">
            <button type="submit">Zarejestruj</button>
        </form>
        <form action="index.php" method="POST">
            <input type="text" name="login" required placeholder="Login">
            <input type="password" name="password" required placeholder="Hasło">
<!--            --><?php //createCsrfInput() ?>
            <button type="submit">Zaloguj</button>
        </form>
    </section>
</div>
</body>
</html>