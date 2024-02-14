<div class="relative left-7 top-7 border border-slate-400 p-8 rounded-lg w-104 h-min">
        <h1 class="text-4xl mb-4">Dodaj pojazd</h1>
        <input type="text" name="vehicle_brand" id="vehicle_brand" placeholder="Marka" class="w-96 border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500 block mb-4">
        <input type="text" name="vehicle_model" id="vehicle_model" placeholder="Model" class="w-96 border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500 block mb-4">
        <input type="text" name="vehicle_registration" id="vehicle_registration" placeholder="Rejestracja" class="w-96 border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500 block mb-4">
        <input type="number" name="vehicle_capacity" id="vehicle_capacity" placeholder="Pojemność" class="w-96 border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500 block mb-4">
        <?php component('departments/selectDepartment') ?>
        <input type="submit" value="Dodaj pojazd" id="add_vehicle_button" class="bg-gray-700 text-white py-2 px-4 rounded-md hover:bg-gray-800 active:outline-none active:bg-gray-800">
    </div>

    <script>
    // const add_vehicle_button = document.getElementById('add_vehicle_button');

    // add_vehicle_button.addEventListener('click', () => {
    //     post("/api/vehicle", {
    //         brand: refId("vehicle_brand"),
    //         model: refId('vehicle_model'),
    //         registration: refId('vehicle_registration'),
    //         capacity: parseInt(refId('vehicle_capacity')),
    //         departmentId: parseInt(refId('vehicle_department'))
    //     }, ()=>{
    //         notyf.success("Stworzono!")
    //         window.location.reload()
    //     })
    // })
</script>