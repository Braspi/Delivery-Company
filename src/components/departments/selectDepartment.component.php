<select id="<?php _t($id); ?>" class="show_departments w-96 border border-gray-500 p-2 rounded-md focus:outline-none focus:border-blue-500 block mb-4">
    <option value="" disabled selected>Wybierz oddział</option>
</select>

<script>
    window.addEventListener('load', () => {
      get("/api/departments", (data) => {
        data.forEach(it => {
          const option = document.createElement('option');
          option.setAttribute('value', it.id);
          // option.setAttribute('selected', 'selected')
          option.appendChild(document.createTextNode(it.name));
          document.getElementById('<?php _t($id); ?>').appendChild(option);
        });
      });
    })

    function getSelectedDepartmentId<?php _t($id) ?>() {
        const item = document.getElementById('<?php _t($id) ?>');
        return item.options[item.selectedIndex].value
    }
</script>