<script>
    $(document).on('click','.add-modal', function (event) {
        reset_form();
        let url = $(this).data('data');
        let data = $(this).data('permission');
        $.each(data, function (key, value) {
            $(`#permission`).append(`
                <label>
                    <input type="checkbox" value="${value.id}" name="permission[]">
                    ${value.name}
                </label>
                <br/>
            `);
        });   
        $('#formId').attr('action', url);
        $('#submit').html('Add');
        $('.modal-title').text('Add role');
    });
    function reset_form() {
        $('#formId').trigger('reset');
        $("input[name=_method]").val('');
        $(`#permission`).html('');
    }
    $(document).on('click','.show-modal', function (event) {
        event.preventDefault();
        let data = $(this).data('data');
        $('.modal-title').text('Role information');
        $.each(data, function (key, value) {
            $(`#modal-show #${key}`).text(value);
        });    
        let roleper = $(this).data('rolepermission'); 
        let str = "";
        $.each(roleper, function (key, value) {
            str += value.name + ", ";
        });   
        $(`#modal-show #roleper`).text(str);
    });
    $(document).on('click','.edit-modal', function (event) {
        reset_form();
        let data = $(this).data('data');
        $('#submit').html('Edit');
        $("input[name='_method']").val("PUT");
        let url = `roles/${data.id}`;
        $('#formId').attr('action', url);
        $('.modal-title').text('Edit role');
        $.each(data, function(key, value){
            $(`input[name=${key}]`).val(value);
        });
        let per = $(this).data('permission'); 
        let arrRoleper = [];
        $.each($(this).data('rolepermission'), function (key, value) {
            arrRoleper[value.id] = 1;
        });
        $.each(per, function (key, value) {
            let checked = (typeof arrRoleper[value.id] !== 'undefined') ? "checked" : "";
            $(`#permission`).append(`
                <label>
                    <input type="checkbox" ${checked} value="${value.id}" name="permission[]">
                    ${value.name}
                </label>
                <br/>
            `);
        });   
    });
</script>