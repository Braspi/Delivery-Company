@extends('layouts.dashboard')
@section('title') Panel - kurierzy @endsection
@section('content')
    <section class="flex flex-col items-center m-6">
        <div class="border border-slate-400 p-8 rounded-lg w-104">
            <h1 class="text-4xl mb-4">Dodaj kuriera</h1>
            {{ new InputComponent("employee_name", "Imię") }}
            {{ new InputComponent("employee_lastname", "Nazwisko") }}
            {{ new InputComponent("employee_phone_number", "Numer telefonu") }}
            {{ new InputComponent("employee_hours_from", "Godziny od", "time") }}
            {{ new InputComponent("employee_hours_to", "Godziny do", "time") }}
            {{ new SelectComponent("departments", "employee_department_id") }}
            {{ new ButtonComponent("Dodaj kuriera", "add_employee_button") }}
        </div>
    </section>

    {{ new TableComponent(
        array("name" => "Imię", "lastname" => "Nazwisko", "phone_number" => "Numer telefonu", "hours_from" => "Godziny pracy od", "hours_to" => "Godziny pracy do", "department" => "Nazwa oddziału", "action_edit" => "", "action_remove" => ""),
        $couriers,
        function (array $row) {
            return array(
                "name" => $row['name'],
                "lastname" => $row['lastname'],
                "phone_number" => $row['phone_number'],
                "hours_from" => $row['hours_from'],
                "hours_to" => $row['hours_to'],
                "department" => $row['department_name'],
                "action_edit" => new HtmlText("<button type='button' class='inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none' onclick='openEditModal({$row['id']})'>Edytuj</button>"),
                "action_remove" => new HtmlText("<button type='button' class='inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-red-600 hover:text-red-800 disabled:opacity-50 disabled:pointer-events-none' onclick='openRemoveModal({$row['id']})'>Usuń</button>")
            );
        }
    ) }}

    {{ new ModalComponent("couriers", "edit") }}
    {{ new ModalComponent("couriers", "remove") }}

    <script>
        const add_employee_button = document.getElementById('add_employee_button');

        add_employee_button.addEventListener('click', () => {

            post("/api/employees", {
                name: refId("employee_name"),
                lastName: refId('employee_lastname'),
                phoneNumber: refId('employee_phone_number'),
                hoursFrom: refId('employee_hours_from'),
                hoursTo: refId('employee_hours_to'),
                departmentId: parseInt(getSelectValue('employee_department_id'))
            }, ()=>{
                notyf.success("Stworzono!")
                window.location.reload()
            })
        })
    </script>
@endsection