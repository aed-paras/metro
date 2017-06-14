$('.panel-delete').click(function () {
    var self = $(this);
    var id = self.attr('data-id');
    $.ajax({
        url: $('meta[name="base-url"]').attr('content') + "/admin/panel/" + id,
        method: 'DELETE',
        data: { '_token': $('meta[name="csrf-token"]').attr('content') }
    }).done(function () {
        $("#panel_row_" + id).slideUp();
    });
});
$('.panel-edit').click(function () {
    var self = $(this);
    var id = self.attr('data-id');
    var panel_name = $("#panel_row_" + id + " .panel-name").text();
    $(".modal-panel-name").text(panel_name);
    $("#editModalForm").attr("action", $('meta[name="base-url"]').attr('content') + "/admin/panel/" + id);
    $("#new-panel-name").val(panel_name);
});
