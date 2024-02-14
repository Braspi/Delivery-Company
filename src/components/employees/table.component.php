<div class="flex flex-col h-min m-8">
    <div class="-m-1.5 overflow-x-auto border border-slate-400 rounded-lg p-4">
        <div class="p-1.5 min-w-full inline-block align-middle">
            <div class="overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead>
                    <tr class="">
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 border-b border-slate-400 uppercase">ID</th>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 border-b border-slate-400 uppercase">Imie</th>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 border-b border-slate-400 uppercase">Nazwisko</th>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 border-b border-slate-400 uppercase">Numer Telefonu</th>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 border-b border-slate-400 uppercase">Godziny od </th>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 border-b border-slate-400 uppercase">Godziny do</th>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 border-b border-slate-400 uppercase">ID oddziału</th>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 border-b border-slate-400 uppercase"></th>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 border-b border-slate-400 uppercase"></th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 text-black" id="tbody"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php component("departments/modals/remove") ?>
<?php component("departments/modals/edit") ?>
<script>
    window.addEventListener('load', () => {
      get("/api/employees", (data) => {
        data.forEach(it => document.getElementById('tbody').appendChild(row(it)));
      });
    })

    function button(data, clickAction) {
        const button = document.createElement("button")
        button.appendChild(document.createTextNode(data))
        button.classList.value = "inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none"
        button.addEventListener('click', () => clickAction())
        return button; 
    }
    function row(data) {
        const tr = document.createElement("tr")
        Object.values(data).forEach(it => tr.appendChild(td(document.createTextNode(it))))
        tr.appendChild(td(button("Edytuj", () => openEditModal(data.id)), "px-6 py-4 whitespace-nowrap text-end text-sm font-medium border-b border-slate-400 text-blue-600 hover:text-blue-800"))
        tr.appendChild(td(button("Usuń", () => openRemoveModal(data.id)), "px-6 py-4 whitespace-nowrap text-end text-sm font-medium border-b border-slate-400 text-red-600 hover:text-red-800"))
        return tr;
    }
    function td(value, style) {
        const td = document.createElement("td")
        td.classList.value = style ? style : "px-6 py-4 whitespace-nowrap text-sm text-black border-b border-slate-400"
        td.appendChild(value)
        return td;
    }
</script>