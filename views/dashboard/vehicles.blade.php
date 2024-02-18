<section class="flex flex-col items-center m-6">
<div class="relative left-7 top-7 border border-slate-400 p-8 rounded-lg w-104 h-min">
        <h1 class="text-4xl mb-4">Dodaj pojazd</h1>
        <input type="text" name="vehicle_brand" id="vehicle_brand" placeholder="Marka" class="w-96 border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500 block mb-4">
        <input type="text" name="vehicle_model" id="vehicle_model" placeholder="Model" class="w-96 border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500 block mb-4">
        <input type="text" name="vehicle_registration" id="vehicle_registration" placeholder="Rejestracja" class="w-96 border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500 block mb-4">
        <input type="number" name="vehicle_capacity" id="vehicle_capacity" placeholder="Pojemność" class="w-96 border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500 block mb-4">
        <?php component('departments/selectDepartment') ?>
        <input type="submit" value="Dodaj pojazd" id="add_vehicle_button" class="bg-gray-700 text-white py-2 px-4 rounded-md hover:bg-gray-800 active:outline-none active:bg-gray-800">
</div>
</section>

<div class="flex flex-col h-min m-8">
    <div class="-m-1.5 overflow-x-auto border border-slate-400 rounded-lg p-4">
        <div class="p-1.5 min-w-full inline-block align-middle">
            <div class="overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead>
                    <tr class="">
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 border-b border-slate-400 uppercase">ID</th>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 border-b border-slate-400 uppercase">Marka</th>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 border-b border-slate-400 uppercase">Model</th>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 border-b border-slate-400 uppercase">Rejestracja</th>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 border-b border-slate-400 uppercase">Ładowność</th>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 border-b border-slate-400 uppercase">Oddział</th>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 border-b border-slate-400 uppercase"></th>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 border-b border-slate-400 uppercase"></th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 text-black" id="tbody">
                    <?php foreach ($vehicles as $vehicle) {?>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-black border-b border-slate-400"><?php _t($vehicle['id']) ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-black border-b border-slate-400"><?php _t($vehicle['brand']) ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-black border-b border-slate-400"><?php _t($vehicle['model']) ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-black border-b border-slate-400"><?php _t($vehicle['registration']) ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-black border-b border-slate-400"><?php _t($vehicle['capacity']) ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-black border-b border-slate-400"><?php _t($vehicle['name']) ?></td>

                            <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium border-b border-slate-400">
                                <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none">Edytuj</button>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium border-b border-slate-400">
                                <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-red-600 hover:text-red-800 disabled:opacity-50 disabled:pointer-events-none">Usuń</button>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>