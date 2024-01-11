<section class="flex flex-col items-center m-6">

        <div class="border border-slate-400 p-8 rounded-lg w-104 h-[576px]">
            <h1 class="text-4xl mb-4">Dodaj pracownika</h1>
            <input type="text" name="employee_name" id="employee_name" placeholder="Imię" class="w-96 border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500 block mb-4">
            <input type="text" name="employee_lastname" id="employee_lastname" placeholder="Nazwisko" class="w-96 border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500 block mb-4">
            <input type="text" name="employee_phone_number" id="employee_phone_number" placeholder="Numer telefonu" class="w-96 border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500 block mb-4">
            <input type="text" name="employee_hours_from" id="employee_hours_from" placeholder="Godziny od" class="w-96 border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500 block mb-4">
            <input type="text" name="employee_hours_to" id="employee_hours_to" placeholder="Godziny do" class="w-96 border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500 block mb-4">
            <!-- <select name="" id="employee_department" class="show_departments w-96 border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500 block mb-4">
                <option value="" disabled selected>Wybierz oddział</option>
            </select> -->
            <?php component('selectDepartment') ?>
            <input type="submit" value="Dodaj pracownika" id="add_employee_button" class="bg-gray-700 text-white py-2 px-4 rounded-md hover:bg-gray-800 active:outline-none active:bg-gray-800">
        </div>


    <div class="border border-slate-400 p-8 rounded-lg inline-block">
        <h1 class="text-4xl mb-4">Wyświetl pracowników</h1>
        <select name="" id="" class="show_departments w-96 border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500 block mb-4">
            <option value="" disabled selected>Wybierz oddział</option>
        </select>
        <input type="submit" value="Wyświetl pracowników" class="bg-gray-700 text-white py-2 px-4 rounded-md hover:bg-gray-800 active:outline-none active:bg-gray-800">
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
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 border-b border-slate-400 uppercase">Imię</th>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 border-b border-slate-400 uppercase">Nazwisko</th>
              <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 border-b border-slate-400 uppercase">Numer telefonu</th>
              <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 border-b border-slate-400 uppercase">Godziny od</th>
              <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 border-b border-slate-400 uppercase">Godziny do</th>
              <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 border-b border-slate-400 uppercase">ID oddziału</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
            <tr>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 border-b border-slate-400 dark:text-gray-200">ID</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 border-b border-slate-400 dark:text-gray-200">Imię</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 border-b border-slate-400 dark:text-gray-200">Nazwisko</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 border-b border-slate-400 dark:text-gray-200">Numer telefonu</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 border-b border-slate-400 dark:text-gray-200">Godziny od</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 border-b border-slate-400 dark:text-gray-200">Godziny do</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 border-b border-slate-400 dark:text-gray-200">ID oddziału</td>
              <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium border-b border-slate-400">
                <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">Edytuj</button>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium border-b border-slate-400">
                <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-red-600 hover:text-red-800 disabled:opacity-50 disabled:pointer-events-none dark:text-red-500 dark:hover:text-red-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">Usuń</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<script>
    const add_employee_button = document.getElementById('add_employee_button');
    const show_deparments = document.getElementsByClassName('show_departments');

    // window.addEventListener('load', () => {
    //   var count = 0;
    //   get("/api/departments", (data) => {
    //     data.forEach(el => {
    //       console.log(el.name);
    //       count++;
    //       var opt = document.createElement('option');
    //       var optText = document.createTextNode(el.name);
    //       opt.setAttribute('value', count);
    //       opt.appendChild(optText);
    //       document.getElementById('employee_department').appendChild(opt);
    //       // show_deparments[0].appendChild(opt);
    //       // show_deparments[1].appendChild(opt);
    //     });
    //   });
    // })

    add_employee_button.addEventListener('click', () => {
        post("/api/employees", {
            name: refId("employee_name"),
            lastName: refId('employee_lastname'),
            phoneNumber: refId('employee_phone_number'),
            hoursFrom: refId('employee_hours_from'),
            hoursTo: refId('employee_hours_to'),
            departmentId: parseInt(refId('employee_department'))
        }, ()=>{})
    })
</script>