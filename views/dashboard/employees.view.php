<div class="bg-[#e7e7e7af] flex">
    <div class="w-[300px] min-w-[235px] bg-[#F9F9F9] h-screen border text-[#6d6d6d] mt-0">
    <h1 class="text-black flex justify-center text-4xl">Witaj, <?php echo $user['login']; ?></h1>
        <ul class="text-2xl">
            <li class="mb-4 h-12 pl-10 flex justify-start border-l-[7px] border-[#53c9ff] text-black">
                <svg xmlns="http://www.w3.org/2000/svg" class="mt-[12px] mr-2"  width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-briefcase"><rect width="20" height="14" x="2" y="7" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
            <input type="submit" value="Pracownicy" id="to_employees"></li>

            <li class="transition ease-in-out delay-0 mb-4 h-12 pl-10 flex justify-start border-[#53c9ff40] hover:text-[#3a6c81] hover:border-l-[5px] hover:border-[#53c9ff70] active:border-l-[7px] active:border-[#53c9ff] active:text-black">
                <svg xmlns="http://www.w3.org/2000/svg" class="mt-3 mr-2" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-folders"><path d="M20 17a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3.9a2 2 0 0 1-1.69-.9l-.81-1.2a2 2 0 0 0-1.67-.9H8a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2Z"/><path d="M2 8v11a2 2 0 0 0 2 2h14"/></svg>    
            <input type="submit" value="Oddziały" id="to_departments"></li>

            <li class="transition ease-in-out delay-0 mb-4 h-12 pl-10 flex justify-start border-[#53c9ff40] hover:text-[#3a6c81] hover:border-l-[5px] hover:border-[#53c9ff70] active:border-l-[7px] active:border-[#53c9ff] active:text-black">
                <svg xmlns="http://www.w3.org/2000/svg" class="mt-3 mr-2" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-line-chart"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/><path d="m16 13-3.5 3.5-2-2L8 17"/></svg>
            <input type="submit" value="Status" id="to_status"></li>

            <li class="transition ease-in-out delay-0 mb-4 h-12 pl-10 flex justify-start border-[#53c9ff40] hover:text-[#3a6c81] hover:border-l-[5px] hover:border-[#53c9ff70] active:border-l-[7px] active:border-[#53c9ff] active:text-black">
                <svg xmlns="http://www.w3.org/2000/svg" class="mt-3 mr-2" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-car"><path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2"/><circle cx="7" cy="17" r="2"/><path d="M9 17h6"/><circle cx="17" cy="17" r="2"/></svg>
            <input type="submit" value="Pojazdy" id="to_vehicles"></li>

            <li class="transition ease-in-out delay-0 mb-4 h-12 pl-10 flex justify-start border-[#53c9ff40] hover:text-[#3a6c81] hover:border-l-[5px] hover:border-[#53c9ff70] active:border-l-[7px] active:border-[#53c9ff] active:text-black">
                <svg xmlns="http://www.w3.org/2000/svg" class="mt-[13px] mr-2" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users-round"><path d="M18 21a8 8 0 0 0-16 0"/><circle cx="10" cy="8" r="5"/><path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3"/></svg>    
            <input type="submit" value="Kurierzy" id="to_couriers"></li>
        </ul>
    </div>

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
    <script>
        const employee_name = document.getElementById('employee_name');
        const employee_lastname = document.getElementById('employee_lastname');
        const employee_phone_number = document.getElementById('employee_phone_number');
        const employee_hours_from = document.getElementById('employee_hours_from');
        const employee_hours_to = document.getElementById('employee_hours_to');
        const employee_department = document.getElementById('employee_department');
        const add_employee_button = document.getElementById('add_employee_button');

        add_employee_button.addEventListener('click', () => {
            (async () => {
                await post("/api/employees", {
                    name: employee_name.value,
                    lastName: employee_lastname.value,
                    phoneNumber: employee_phone_number.value,
                    hoursFrom: employee_hours_from.value,
                    hoursTo: employee_hours_to.value,
                    departmentId: parseInt(employee_department.value)
                }, ()=>{})
            })();
        })

        const to_employees = document.getElementById("to_employees");
        const to_departments = document.getElementById("to_departments");
        const to_status = document.getElementById("to_status");
        const to_vehicles = document.getElementById("to_vehicles");
        const to_couriers = document.getElementById("to_couriers");

        to_employees.addEventListener('click', () => redirect("/dashboard/employees"));
        to_departments.addEventListener('click', () => redirect("/dashboard/departments"));
        to_status.addEventListener('click', () => redirect("/dashboard/status"));
        to_vehicles.addEventListener('click', () => redirect("/dashboard/vehicles"));
        to_couriers.addEventListener('click', () => redirect("/dashboard/couriers"));
    </script>
</div>