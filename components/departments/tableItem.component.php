<tr>
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 border-b border-slate-400"><?php _t($department['id']); ?></td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 border-b border-slate-400"><?php _t($department['name']); ?></td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 border-b border-slate-400">
        <?php
        $apartment = $department['local_number'] == null ? "" : "m. {$department['local_number']}";
        _t("ul. {$department['street']} {$department['home_number']} $apartment");
        ?>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 border-b border-slate-400">
        <?php _t("{$department['post_code']} {$department['city']}"); ?>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 border-b border-slate-400"><?php _t($department['phone_number']); ?></td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 border-b border-slate-400"><?php _t($department['email']); ?></td>
    <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium border-b border-slate-400">
        <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none">Edytuj</button>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium border-b border-slate-400">
        <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-red-600 hover:text-red-800 disabled:opacity-50 disabled:pointer-events-none">Usuń</button>
    </td>
</tr>