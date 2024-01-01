<section class="bg-[#F5F5F5] h-screen flex items-center justify-center">
    <div class="flex">
        <div class="border p-8 rounded-lg w-96">
            <h1 class="text-3xl font-semibold mb-6 text-center">Zarejestruj się, aby kontynuować</h1>
            <form action="" method="POST">
                <div class="mb-4">
                    <label for="login" class="text-gray-700 block mb-1">Login</label>
                    <input type="text" id="login_input" required placeholder="Login" class="w-full border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="password" class="text-gray-700 block mb-1">Hasło</label>
                    <input type="password"  id="password_input" required placeholder="Password" class="w-full border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="password" class="text-gray-700 block mb-1">Powtórz Hasło</label>
                    <input type="password"  id="password_input" required placeholder="Password" class="w-full border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500">
                </div>
                <?php //createCsrfInput() ?>
                <div class="flex justify-center items-center">
                    <button type="submit" class="bg-gray-700 text-white py-2 px-4 rounded-md hover:bg-gray-800 focus:outline-none focus:bg-gray-800">Zarejestruj się</button>
                </div>
            </form>
            <div class="text-gray-700 text-center">
                <p class="mt-4">Posiadasz konto? <a href="/" class="text-gray-500 underline ">Zaloguj się!</a></p>
                <p class="text-sm opacity-70 mt-1"> <?php echo date('Y') ?> © Design and code - notbytes.pl</p>
            </div>
        </div>
    </div>
</section>