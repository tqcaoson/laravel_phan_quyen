<script>
    $(document).on('click','.add-modal', function (event) {
        reset_form();
        let url = $(this).data('data');
        $('#formId').attr('action', url);
        $('#submit').html('Add');
        $('.modal-title').text('Add user');
        $('#password').attr({"required" : true});
        $('#confirm_password').attr({"required" : true});
        let data = $(this).data('role');
        $.each(data, function (key, value) {
            $(`#roles`).append(`
                <option value="${value.name}">${value.name}</option>
            `);
        });   
    });
    function reset_form() {
        $('#formId').trigger('reset');
        $("input[name=_method]").val('');
        $(`#roles`).html('');
        $('#formId').parsley().reset();
    }
    $(document).on('click','.show-modal', function (event) {
        event.preventDefault();
        let data = $(this).data('data');
        $('.modal-title').text('User information');
        $.each(data, function (key, value) {
            $(`#modal-show #${key}`).text(value);
        });      
        let roles = $(this).data('userrole');  
        let str = "";
        $.each(roles, function (key, value) {
            str += value + ", ";
        });   
        $(`#modal-show #roles`).text(str);
    });
    $(document).on('click','.edit-modal', function (event) {
        reset_form();
        let data = $(this).data('data');
        $('#submit').html('Edit');
        $("input[name='_method']").val("PUT");
        let url = `users/${data.id}`;
        $('#formId').attr('action', url);
        $('.modal-title').text('Edit user');
        $('#password').removeAttr("required");
        $('#confirm_password').removeAttr("required");
        $.each(data, function(key, value){
            $(`input[name=${key}]`).val(value);
        });
        let role = $(this).data('role'); 
        let arrUserrole = [];
        $.each($(this).data('userrole'), function (key, value) {
            arrUserrole[value] = 1;
        });
        $.each(role, function (key, value) {
            let selected = (typeof arrUserrole[value.name] !== 'undefined') ? "selected" : "";
            $(`#roles`).append(`
                <option ${selected} value="${value.name}">${value.name}</option>
            `);
        });  
    });
</script>