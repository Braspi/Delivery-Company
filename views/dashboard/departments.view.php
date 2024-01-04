<div class="relative left-7 top-7 border border-slate-400 p-8 rounded-lg w-104 h-[576px] inline-block">
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
<script>
    const add_department_button = document.getElementById('add_department_button');

    add_department_button.addEventListener('click', () => {
        (async () => {
            await post("/api/department", {
                name: refId('department_name'),
                street: refId('department_street'),
                homeNumber: refId('department_home_number'),
                localNumber: parseInt(refId('department_local_number')),
                postCode: refId('department_post_code'),
                city: refId('department_city'),
                phoneNumber: refId('department_phone_number'),
                email: refId('department_email')
            }, ()=>{})
        })();
    })
</script>