@extends('layouts.dashboard')
@section('title') Panel - status paczki @endsection
@section('content')
    <section class="flex flex-col items-center m-6">
        <div class="border border-slate-400 p-8 rounded-lg w-104">
            <h1 class="text-4xl mb-4">Dodaj paczkę</h1>
            <input type="text" name="delivery_tracking_number" id="delivery_tracking_number" placeholder="Numer śledzenia paczki" class="w-96 border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500 block mb-4">
            <input type="text" name="delivery_weight" id="delivery_weight" placeholder="Waga" class="w-96 border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500 block mb-4">
            <h3 class="font-semibold text-xl pb-2 text-gray-900">Status płatności</h3>
            <ul class="mb-4 items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-500 rounded-lg sm:flex">
                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                    <div class="flex items-center ps-3">
                        <input id="radio1" type="radio" value="paid" name="payment_status" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                        <label for="radio1" class="w-full py-3 ms-2 text-sm font-medium text-gray-900">zapłacone</label>
                    </div>
                </li>
                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                    <div class="flex items-center ps-3">
                        <input id="radio2" type="radio" value="new_payment" name="payment_status" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2 dark:bg-gray-600">
                        <label for="radio2" class="w-full py-3 ms-2 text-sm font-medium text-gray-900">nowa płatność</label>
                    </div>
                </li>
            </ul>

            <input type="date" name="delivery_sending_date" id="delivery_sending_date" class="w-96 border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500 block mb-4">
            <input type="text" name="delivery_price" id="delivery_price" placeholder="Cena" class="w-96 border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500 block mb-4">
            <input type="text" name="delivery_id" id="delivery_id" placeholder="Identyfikator zamówienia" class="w-96 border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500 block mb-4">
            <input type="submit" value="Dodaj paczkę" id="add_status_button" class="bg-gray-700 text-white py-2 px-4 rounded-md hover:bg-gray-800 active:outline-none active:bg-gray-800">
        </div>
    </section>

    <script>
        const add_status_button = document.getElementById('add_status_button');

        add_status_button.addEventListener('click', () => {
            post("/api/departments", {
                name: refId('department_name'),
                street: refId('department_street'),
                homeNumber: refId('department_home_number'),
                localNumber: parseInt(refId('department_local_number')),
                postCode: refId('department_post_code'),
                city: refId('department_city'),
                phoneNumber: refId('department_phone_number'),
                email: refId('department_email')
            }, ()=> {
                notyf.success('Pomyślnie utworzono nowy oddział!')
            })
        })

    </script>
@endsection