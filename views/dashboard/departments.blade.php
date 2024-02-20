@extends('layouts.dashboard')
@section('title') Panel - oddziały @endsection
@section('content')
    <section class="flex flex-col items-center m-6 mr-0">
        <div class="border border-slate-400 p-8 rounded-lg h-fit">
            <h1 class="text-4xl mb-4">Dodaj oddział</h1>
            {{ new InputComponent("department_name", "Nazwa") }}
            {{ new InputComponent("department_street", "Ulica") }}
            {{ new InputComponent("department_home_number", "Numer domu") }}
            {{ new InputComponent("department_local_number", "Numer lokalu") }}
            {{ new InputComponent("department_post_code", "Kod pocztowy") }}
            {{ new InputComponent("department_city", "Miasto") }}
            {{ new InputComponent("department_phone_number", "Numer telefonu") }}
            {{ new InputComponent("department_email", "Email") }}
            <button type="submit" id="add_department_button" class="bg-gray-700 text-white py-2 px-4 rounded-md hover:bg-gray-800 active:outline-none active:bg-gray-800">
                Dodaj oddział
            </button>
        </div>
    </section>

    {{ new TableComponent(
        array("name" => "Nazwa", "address" => "Adres", "city" => "miejscowość", "phone" => "telefon", "email" => "email", "action_edit" => "", "action_remove" => ""),
        $departments,
        function (array $row) {
            $apartment = $row['local_number'] == null ? "" : "m. {$row['local_number']}";
            return array(
                "name" => $row['name'],
                "address" => "ul. {$row['street']} {$row['home_number']} $apartment",
                "city" => $row['post_code'] . " " . $row['city'],
                "phone" => $row['phone_number'],
                "email" => $row['email'],
                "action_edit" => new HtmlText("<button type='button' class='inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none' onclick='openEditModal({$row['id']})'>Edytuj</button>"),
                "action_remove" => new HtmlText("<button type='button' class='inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-red-600 hover:text-red-800 disabled:opacity-50 disabled:pointer-events-none' onclick='openRemoveModal({$row['id']})'>Usuń</button>")
            );
        }
    ) }}

    {{ new ModalComponent("departments", "edit") }}
    {{ new ModalComponent("departments", "remove") }}
@endsection
@section("script")
    <script>
        document.getElementById('add_department_button').addEventListener('click', () => {
            post("/api/departments", {
                name: refId('department_name'),
                street: refId('department_street'),
                homeNumber: refId('department_home_number'),
                localNumber: parseInt(refId('department_local_number')),
                postCode: refId('department_post_code'),
                city: refId('department_city'),
                phoneNumber: refId('department_phone_number'),
                email: refId('department_email')
            }, ()=> {
                notyf.success('Pomyślnie utworzono nowy oddział!')
            })
        })
    </script>
@endsection