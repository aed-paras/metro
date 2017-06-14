$('.station-delete').click(function () {
    var self = $(this);
    var id = self.data('id');
    $.ajax({
        url: $('meta[name="base-url"]').attr('content') + "/admin/station/" + id,
        method: 'DELETE',
        data: { '_token': $('meta[name="csrf-token"]').attr('content') }
    }).done(function () {
        $("#station_row_" + id).slideUp();
        deleteNotification();
    });
});
$('.station-edit').click(function () {
    var self = $(this);
    var id = self.data('id');
    var station_name = $("#station_row_" + id + " .station-name").text();
    $(".modal-station-name").text(station_name);

    var selectedMetroID = $("#station_row_" + id + " .station-metro_line").data('line_id');
    $("#editModalForm").attr("action", $('meta[name="base-url"]').attr('content') + "/admin/station/" + id);
    $("#new-station-name").val(station_name);
    $("#city_option_" + current_city_id).prop('selected', true);
    $("#line_option_" + selectedMetroID).prop('selected', true);
});
