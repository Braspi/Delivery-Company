<div class="flex flex-col h-min m-8">
    <div class="-m-1.5 overflow-x-auto border border-slate-400 rounded-lg p-4">
        <div class="p-1.5 min-w-full inline-block align-middle">
            <div class="overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead>
                    <tr>
                        <?php foreach ($fields as $field) { ?>
                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 border-b border-slate-400 uppercase"><?php _t($field) ?></th>
                        <?php } ?>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                    <?php foreach ($values as $value) { ?>
                        <tr>
                            <?php
                            $index = 0;
                            foreach ($fields as $field) { ?>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 border-b border-slate-400"><?php _t($value[$index]) ?></td>
                            <?php
                                $index++;
                            } ?>
                            <!--                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 border-b border-slate-400 dark:text-gray-200">ID</td>-->
                            <!--                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 border-b border-slate-400 dark:text-gray-200">Imię</td>-->
                            <!--                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 border-b border-slate-400 dark:text-gray-200">Nazwisko</td>-->
                            <!--                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 border-b border-slate-400 dark:text-gray-200">Numer telefonu</td>-->
                            <!--                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 border-b border-slate-400 dark:text-gray-200">Godziny od</td>-->
                            <!--                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 border-b border-slate-400 dark:text-gray-200">Godziny do</td>-->
                            <!--                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 border-b border-slate-400 dark:text-gray-200">ID oddziału</td>-->
                            <!--                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium border-b border-slate-400">-->
                            <!--                            <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">Edytuj</button>-->
                            <!--                        </td>-->
                            <!--                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium border-b border-slate-400">-->
                            <!--                            <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-red-600 hover:text-red-800 disabled:opacity-50 disabled:pointer-events-none dark:text-red-500 dark:hover:text-red-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">Usuń</button>-->
                            <!--                        </td>-->
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>