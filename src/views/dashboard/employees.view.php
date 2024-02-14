<section class="flex flex-col items-center m-6">
    <div class="border border-slate-400 p-8 rounded-lg w-104">
        <h1 class="text-4xl mb-4">Dodaj pracownika</h1>
        <input type="text" id="employee_name" placeholder="Imię" class="w-96 border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500 block mb-4">
        <input type="text" id="employee_lastname" placeholder="Nazwisko" class="w-96 border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500 block mb-4">
        <input type="text" id="employee_phone_number" placeholder="Numer telefonu" class="w-96 border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500 block mb-4">
        <input type="time" id="employee_hours_from" placeholder="Godziny od" class="w-96 border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500 block mb-4">
        <input type="time" id="employee_hours_to" placeholder="Godziny do" class="w-96 border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500 block mb-4">
        <?php component('departments/selectDepartment') ?>
        <input type="submit" value="Dodaj pracownika" id="add_employee_button" class="bg-gray-700 text-white py-2 px-4 rounded-md hover:bg-gray-800 active:outline-none active:bg-gray-800">
    </div>
</section>
<?php
component("employees/table");
    // component("table", array(
    //     "fields" => ['ID', 'name'],
    //     "values" => array(array("1", "chuj"))
    // ));
?>
<script>
    const add_employee_button = document.getElementById('add_employee_button');

    add_employee_button.addEventListener('click', () => {
        post("/api/employees", {
            name: refId("employee_name"),
            lastName: refId('employee_lastname'),
            phoneNumber: refId('employee_phone_number'),
            hoursFrom: refId('employee_hours_from'),
            hoursTo: refId('employee_hours_to'),
            departmentId: parseInt(refId('employee_department'))
        }, ()=>{
            notyf.success("Stworzono!")
            window.location.reload()
        })
    })
</script>