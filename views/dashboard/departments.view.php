<section class="flex flex-col items-center m-6">
    <div class="border border-slate-400 p-8 rounded-lg w-104 h-[576px]">
        <h1 class="text-4xl mb-4">Dodaj oddział</h1>
        <input type="text" name="department_name" id="department_name" placeholder="Nazwa" class="w-96 border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500 block mb-4">
        <input type="text" name="department_street" id="department_street" placeholder="Ulica" class="w-96 border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500 block mb-4">
        <input type="text" name="department_home_number" id="department_home_number" placeholder="Numer domu" class="w-96 border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500 block mb-4">
        <input type="text" name="department_local_number" id="department_local_number" placeholder="Numer lokalu" class="w-96 border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500 block mb-4">
        <input type="text" name="department_post_code" id="department_post_code" placeholder="Kod pocztowy" class="w-96 border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500 block mb-4">
        <input type="text" name="department_city" id="department_city" placeholder="Miasto" class="w-96 border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500 block mb-4">
        <input type="text" name="department_phone_number" id="department_phone_number" placeholder="Numer telefonu" class="w-96 border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500 block mb-4">
        <input type="text" name="department_email" id="department_email" placeholder="Email" class="w-96 border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500 block mb-4">
        <input type="submit" value="Dodaj oddział" id="add_department_button" class="bg-gray-700 text-white py-2 px-4 rounded-md hover:bg-gray-800 active:outline-none active:bg-gray-800">
    </div>
</section>

<div class="flex flex-col h-min m-8">
<div class="-m-1.5 overflow-x-auto border border-slate-400 rounded-lg p-4">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead>
                            <tr>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 border-b border-slate-400 uppercase">ID</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 border-b border-slate-400 uppercase">Nazwa</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 border-b border-slate-400 uppercase">Adres</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 border-b border-slate-400 uppercase">Miejscowość</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 border-b border-slate-400 uppercase">Telefon</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 border-b border-slate-400 uppercase">Email</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                        <?php
                        foreach (departmentRepository->find() as $department) {
                            component("departments/tableItem", array("department" => $department));
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>


<script>
    const add_department_button = document.getElementById('add_department_button');

    function buildTable() {
        get("/api/departments", ()=> {
            
        });
    }

    add_department_button.addEventListener('click', () => {
        (async () => {
            await post("/api/departments", {
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
        })();
    })
</script>