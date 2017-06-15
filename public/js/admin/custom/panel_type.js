$('.panel_type-delete').click(function () {
    var self = $(this);
    var id = self.data('id');
    $.ajax({
        url: $('meta[name="base-url"]').attr('content') + "/admin/panel_type/" + id,
        method: 'DELETE',
        data: { '_token': $('meta[name="csrf-token"]').attr('content') }
    }).done(function () {
        $("#panel_type_row_" + id).slideUp();
        deleteNotification();
    });

});
$('.panel_type-edit').click(function () {
    var self = $(this);
    var id = self.data('id');
    var panel_type_name = $("#panel_type_row_" + id + " .panel_type-name").text();
    $("#editModalForm").attr("action", $('meta[name="base-url"]').attr('content') + "/admin/panel_type/" + id);
    $(".modal-panel_type-name").text(panel_type_name);
    $("#new-panel_type-name").val(panel_type_name);
});
