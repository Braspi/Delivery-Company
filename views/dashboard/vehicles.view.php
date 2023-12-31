vehicles

<div class="relative left-7 top-7 border border-slate-400 p-8 rounded-lg w-104 h-[458px] inline-block">
        <h1 class="text-4xl mb-4">Dodaj pracownika</h1>
        <input type="text" name="employee_name" id="employee_name" placeholder="Imię" class="w-96 border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500 block mb-4">
        <input type="text" name="employee_lastname" id="employee_lastname" placeholder="Nazwisko" class="w-96 border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500 block mb-4">
        <input type="text" name="employee_phone_number" id="employee_phone_number" placeholder="Numer telefonu" class="w-96 border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500 block mb-4">
        <input type="text" name="employee_hours_from" id="employee_hours_from" placeholder="Godziny od" class="w-96 border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500 block mb-4">
        <input type="text" name="employee_hours_to" id="employee_hours_to" placeholder="Godziny do" class="w-96 border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500 block mb-4">
        <select name="" id="employee_department" class="w-96 border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500 block mb-4">
            <optgroup label="Oddziały">
                <option value="" disabled selected>Wybierz oddział</option>
                <option value="1">Oddział 1</option>
            </optgroup>
        </select>
        <input type="submit" value="Dodaj pracownika" id="add_employee_button" class="bg-gray-700 text-white py-2 px-4 rounded-md hover:bg-gray-800 active:outline-none active:bg-gray-800">
    </div>

    <div class="relative left-7 top-7 border border-slate-400 p-8 rounded-lg w-104 h-min ml-10 inline-block">
        <h1 class="text-4xl mb-4">Wyświetl pracowników</h1>
        <select name="" id="" class="w-96 border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500 block mb-4">
            <optgroup label="Oddziały">
                <option value="" disabled selected>Wybierz oddział</option>
                <option value="">Oddział 1</option>
            </optgroup>
        </select>
        <input type="submit" value="Wyświetl pracowników" class="bg-gray-700 text-white py-2 px-4 rounded-md hover:bg-gray-800 active:outline-none active:bg-gray-800">
    </div>