@extends('layouts.app')
@section('title') Logowanie @endsection
@section('content')
    <?php
    if (isset($_SESSION['isLoggedIn'])) header("Location: /dashboard");
    ?>
    <div class="bg-[#F5F5F5] h-screen flex items-center justify-center">
        <div class="flex">
            <div class="border p-8 rounded-lg w-96">
                <h1 class="text-3xl font-semibold mb-6 text-center">Zaloguj się, aby kontynuować</h1>
                <section>
                    <div class="mb-4">
                        <label for="login_input" class="text-gray-700 block mb-1">Login</label>
                        <input type="text" id="login_input" required placeholder="Login" class="w-full border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="password_input" class="text-gray-700 block mb-1">Hasło</label>
                        <input type="password" id="password_input" placeholder="Password" class="w-full border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500">
                    </div>
                    <div class="flex justify-center items-center">
                        <button id="login_button" class="bg-gray-700 text-white py-2 px-4 rounded-md hover:bg-gray-800 focus:outline-none focus:bg-gray-800">Zaloguj</button>
                    </div>
                </section>
                <div class="text-gray-700 text-center">
                    <p class="mt-4">Nie masz jeszcze konta? <a href="/register" class="text-gray-500 underline ">Zarejestruj się!</a></p>
                    <p class="text-sm opacity-70 mt-1">{{ date('Y')  }} © Design and code - notbytes.pl</p>
                </div>
            </div>
        </div>
        <script>
            const login_button = document.getElementById('login_button');

            login_button.addEventListener('click', () => {
                post("/api/auth/login", {
                    login: refId('login_input'),
                    password: refId('password_input')
                }, () => redirect("/dashboard"))
            })
        </script>
    </div>
@endsection