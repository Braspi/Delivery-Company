@extends('layouts.dashboard')
@section('title') Panel - pojazdy @endsection
@section('content')
    <section class="flex flex-col items-center m-6">
        <div class="relative left-7 top-7 border border-slate-400 p-8 rounded-lg w-104 h-min">
            <h1 class="text-4xl mb-4">Dodaj pojazd</h1>
            {{ new InputComponent("vehicle_brand", "Marka") }}
            {{ new InputComponent("vehicle_model", "Model") }}
            {{ new InputComponent("vehicle_registration", "Rejestracja") }}
            {{ new InputComponent("vehicle_capacity", "Pojemność", "number") }}
            {{ new SelectComponent("departments", "vehicle_department_id") }}
            {{ new ButtonComponent("Dodaj pojazd", "add_vehicle_button") }}
        </div>
    </section>

    {{ new TableComponent(
        array("brand" => "Marka", "model" => "Model", "registration" => "Rejestracja", "capacity" => "Pojemność", "department" => "Nazwa oddziału", "action_edit" => "", "action_remove" => ""),
        $vehicles,
        function (array $row) {
            return array(
                "brand" => $row['brand'],
                "model" => $row['model'],
                "registration" => $row['registration'],
                "capacity" => $row['capacity'],
                "department" => $row['department_name'],
                "action_edit" => new HtmlText("<button type='button' class='inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none' onclick='openEditModal({$row['id']})'>Edytuj</button>"),
                "action_remove" => new HtmlText("<button type='button' class='inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-red-600 hover:text-red-800 disabled:opacity-50 disabled:pointer-events-none' onclick='openRemoveModal({$row['id']})'>Usuń</button>")
            );
        }
    ) }}

    {{ new ModalComponent("vehicles", "edit") }}
    {{ new ModalComponent("vehicles", "remove") }}
@endsection
@section("script")
    <script>
        document.getElementById('add_vehicle_button').addEventListener('click', () => {
            post("/api/vehicles", {
                brand: refId('vehicle_brand'),
                model: refId('vehicle_model'),
                registration: refId('vehicle_registration'),
                capacity: parseInt(refId('vehicle_capacity')),
                departmentId: parseInt(getSelectValue('vehicle_department_id'))
            }, ()=> {
                window.location.reload()
                notyf.success('Pomyślnie utworzono nowy pojazd!')
            })
        })
    </script>
@endsection