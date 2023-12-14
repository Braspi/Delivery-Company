<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<!--    --><?php
//    include 'security/csrf.php';
//    include 'security/auth.php';
//
//    createCsrfToken();
//    if($_SERVER['REQUEST_METHOD'] == 'POST') {
//        validateCsrfToken();
//        if(!isset($_POST['login']) || !isset($_POST['password'])) {
//            die("Bad Request");
//        }
//        $connection = mysqli_connect("localhost", "root", null, "firma_kurierska");
//        $query = mysqli_prepare($connection, "SELECT id, login, password FROM accounts WHERE login = ?");
//        mysqli_stmt_bind_param($query, 's', $_POST['login']);
//        mysqli_stmt_execute($query);
//        mysqli_stmt_bind_result($query, $user_id, $login, $user_password);
//        mysqli_stmt_fetch($query);
//
//        if(password_verify($_POST['password'], $user_password)) {
//            echo "Zalogowano!";
//            saveSession($user_id);
//            header("Location: dashboard");
//        } else {
//            echo "Niepoprawne hasło lub nazwa użytkownika!";
//        }
//        destroyCsrfToken();
//        createCsrfToken();
//    }
//    ?>
</head>
<body class="bg-[#F5F5F5] h-screen flex items-center justify-center h-screen">
<div class="flex">
    <div class="border p-8 rounded-lg w-96">
        <h1 class="text-3xl font-semibold mb-6 text-center">Zaloguj się, aby kontynuować</h1>
        <form action="" method="POST">
            <div class="mb-4">
                <label for="login" class="text-gray-700 block mb-1">Login</label>
                <input type="text" name="login" id="login" required placeholder="Login" class="w-full border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="password" class="text-gray-700 block mb-1">Hasło</label>
                <input type="password" name="password" id="password" required placeholder="Password" class="w-full border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500">
            </div>
            <?php //createCsrfInput() ?>
            <div class="flex justify-center items-center">
                <button type="submit" class=" bg-gray-700 text-white py-2 px-4 rounded-md hover:bg-gray-800 focus:outline-none focus:bg-gray-800">Zaloguj</button>
            </div>
        </form>
        <div class="text-gray-700 text-center">
            <p class="mt-4">Nie masz jeszcze konta? <a href="/register" class="text-gray-500 underline ">Zarejestruj się!</a></p>
            <p class="text-sm opacity-70 mt-1"> <?php echo date('Y') ?> © Design and code - notbytes.pl</p>
        </div>
    </div>
</div>
</body>
<script>
    (async () => {
        const res = await fetch("/api/auth/login", {
            method: 'POST',
            body: JSON.stringify({
                login: "erw",
                password: "eewr"
            })
        })
        console.log(await res.json());
    })();
</script>
</html>