<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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