<section class="flex flex-col items-center m-6">
    <div class="border border-slate-400 p-8 rounded-lg w-104">
        <h1 class="text-4xl mb-4">Dodaj odbiorcę</h1>
        <input type="text" name="recipient_name" id="recipient_name" placeholder="Imię" class="w-96 border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500 block mb-4">
        <input type="text" name="recipient_lastname" id="recipient_lastname" placeholder="Nazwisko" class="w-96 border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500 block mb-4">
        <input type="text" name="recipient_phone_number" id="recipient_phone_number" placeholder="Numer telefonu" class="w-96 border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500 block mb-4">
        <input type="text" name="recipient_email" id="recipient_email" placeholder="Email" class="w-96 border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500 block mb-4">
        <input type="text" name="recipient_street" id="recipient_street" placeholder="Ulica" class="w-96 border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500 block mb-4">
        <input type="text" name="recipient_local_number" id="recipient_local_number" placeholder="Numer lokalu" class="w-96 border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500 block mb-4">
        <input type="" name="recipient_post_code" id="recipient_post_code" placeholder="Kod pocztowy" class="w-96 border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500 block mb-4">
        <input type="text" name="recipient_city" id="recipient_city" placeholder="Miasto" class="w-96 border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500 block mb-4">
        <input type="submit" value="Dodaj odbiorcę" id="add_recipient_button" class="bg-gray-700 text-white py-2 px-4 rounded-md hover:bg-gray-800 active:outline-none active:bg-gray-800">
    </div>
</section>

<script>
    const add_recipient_button = document.getElementById('add_recipient_button');

    add_recipient_button.addEventListener('click', () => {
        post("/api/recipients", {
            name: refId("recipient_name"),
            lastName: refId('recipient_lastname'),
            email: refId('recipient_email'),
            street: refId('recipient_street'),
            localNumber: refId('recipient_local_number'),
            postCode: refId('recipient_post_code'),
            city: refId('recipient_city'),
        }, ()=>{
            notyf.success("Stworzono!")
            window.location.reload()
        })
    })
</script>