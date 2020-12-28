$(document).ready(function () {
    const action = window.location.pathname;
    //const action = window.location.pathname.split('/').pop();
    const table = $('#data_table');
    table.on('click', '.delete', function (e) {
        var id = $(this).closest('tr').attr('value');
        $('#delete_form').attr('action', `${action}/${id}` );
        $('#modal_delete').modal('show');
    });
});
