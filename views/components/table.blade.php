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