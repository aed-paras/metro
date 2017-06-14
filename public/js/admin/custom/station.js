$('.station-delete').click(function () {
    var self = $(this);
    var id = self.attr('data-id');
    $.ajax({
        url: $('meta[name="base-url"]').attr('content') + "/admin/station/" + id,
        method: 'DELETE',
        data: { '_token': $('meta[name="csrf-token"]').attr('content') }
    }).done(function () {
        $("#station_row_" + id).slideUp();
    });
});
$('.station-edit').click(function () {
    var self = $(this);
    var id = self.attr('data-id');
    var station_name = $("#station_row_" + id + " .station-name").text();
    $(".modal-station-name").text(station_name);
    // $("#modal-station-id").val(id);
    $("#editModalForm").attr("action", $('meta[name="base-url"]').attr('content') + "/admin/station/" + id);
    $("#new-station-name").val(station_name);
    $("#option_" + current_city_id).prop('selected', true);
});
