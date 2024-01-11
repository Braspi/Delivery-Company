<select name="" id="employee_department" class="show_departments w-96 border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500 block mb-4">
    <option value="" disabled selected>Wybierz oddział</option>
</select>

<script>
    window.addEventListener('load', () => {
      var count = 0;
      get("/api/departments", (data) => {
        data.forEach(el => {
          console.log(el.name);
          count++;
          var opt = document.createElement('option');
          var optText = document.createTextNode(el.name);
          opt.setAttribute('value', count);
          opt.appendChild(optText);
          document.getElementById('employee_department').appendChild(opt);
          // show_deparments[0].appendChild(opt);
          // show_deparments[1].appendChild(opt);
        });
      });
    })
</script>