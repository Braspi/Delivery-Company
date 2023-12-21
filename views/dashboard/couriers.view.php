<div class="bg-[#e7e7e7] flex">
    <div class="w-[300px] min-w-[235px] bg-[#F9F9F9] h-screen border text-[#6d6d6d] mt-0">
    <h1 class="text-black flex justify-center text-4xl">Witaj, <?php echo $user['login']; ?></h1>
        <ul class="text-2xl">
            <li class="transition ease-in-out delay-0 mb-4 h-12 pl-10 flex justify-start border-[#53c9ff40] hover:text-[#3a6c81] hover:border-l-[5px] hover:border-[#53c9ff70] active:border-l-[7px] active:border-[#53c9ff] active:text-black">
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

            <li class="mb-4 h-12 pl-10 flex justify-start border-l-[7px] border-[#53c9ff] text-black">
                <svg xmlns="http://www.w3.org/2000/svg" class="mt-[13px] mr-2" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users-round"><path d="M18 21a8 8 0 0 0-16 0"/><circle cx="10" cy="8" r="5"/><path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3"/></svg>    
            <input type="submit" value="Kurierzy" id="to_couriers"></li>
        </ul>
    </div>
    <script>
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