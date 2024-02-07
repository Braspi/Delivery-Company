<select id="employee_department" class="show_departments w-96 border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500 block mb-4">
    <option value="" disabled selected>Wybierz oddział</option>
</select>

<script>
    window.addEventListener('load', () => {
      get("/api/departments", (data) => {
        data.forEach(it => {
          const option = document.createElement('option');
          option.setAttribute('value', it.id);
          option.appendChild(document.createTextNode(it.name));
          document.getElementById('employee_department').appendChild(option);
        });
      });
    })
</script>