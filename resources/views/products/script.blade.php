<script>
    $(document).on('click','.add-modal', function (event) {
        reset_form();
        let url = $(this).data('data');
        $('#formId').attr('action', url);
        $('#submit').html('Add');
        $('.modal-title').text('Add product');
    });
    function reset_form() {
        $('#formId').trigger('reset');
        $("input[name=_method]").val('');
        $('textarea[name=detail]').val('');
        $('#formId').parsley().reset();
    }
    $(document).on('click','.show-modal', function (event) {
        event.preventDefault();
        let data = $(this).data('data');
        $('.modal-title').text('Product information');
        $.each(data, function (key, value) {
            $(`#modal-show #${key}`).text(value);
        });      
    });
    $(document).on('click','.edit-modal', function (event) {
        reset_form();
        let data = $(this).data('data');
        $('#submit').html('Edit');
        $("input[name='_method']").val("PUT");
        let url = `products/${data.id}`;
        $('#formId').attr('action', url);
        $('.modal-title').text('Edit product');
        $.each(data, function(key, value){
            $(`input[name=${key}]`).val(value);
            $(`textarea[name=${key}]`).val(value);
        });
    });
</script>