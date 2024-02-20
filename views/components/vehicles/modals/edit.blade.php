@php $id = uniqid(); @endphp
<div class="relative z-10 hidden" id="edit_modal_{{ $id }}" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10">
                            <i class="text-blue-600" data-lucide="pencil"></i>
                        </div>
                        <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                            <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Edycja</h3>
                            <div class="mt-2">
                                {{ new InputComponent("edit_vehicle_brand", "Marka") }}
                                {{ new InputComponent("edit_vehicle_model", "Model") }}
                                {{ new InputComponent("edit_vehicle_registration", "Rejestracja") }}
                                {{ new InputComponent("edit_vehicle_capacity", "Pojemność", "number") }}
                                {{ new SelectComponent("departments", "edit_vehicle_department_id") }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                    <button type="button" onclick="process{{ $id }}()" class="inline-flex w-full justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 sm:ml-3 sm:w-auto">Edytuj</button>
                    <button type="button" onclick="closeEditModal()" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Anuluj</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const editModal = document.getElementById('edit_modal_{{ $id }}')

    let item_id_{{ $id }} = null;
    function openEditModal(id) {
        item_id_{{ $id }} = id;
        get(`/api/vehicles/${item_id_{{ $id }}}`, (data) => {
            Object.keys(data).forEach(key => {
                if(key === 'department_id') return
                console.log(`edit_vehicle_${key}`, data[key])
                value(`edit_vehicle_${key}`, data[key])
            })
            setSelectValue('edit_vehicle_department_id', id)
        })
        editModal.classList.remove('hidden')
    }
    function closeEditModal() {
        item_id_{{ $id }} = null;
        editModal.classList.add('hidden')
    }
    function process{{ $id }}() {
        put(`/api/vehicles/${item_id_{{ $id }}}`, {
            brand: refId("edit_vehicle_brand"),
            model: refId('edit_vehicle_model'),
            registration: refId('edit_vehicle_registration'),
            capacity: refId('edit_vehicle_capacity'),
            departmentId: parseInt(refId('edit_vehicle_department_id')),
        }, async() => {
            window.location.reload()
            closeEditModal()
        })
    }
</script>