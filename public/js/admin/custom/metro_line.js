$('.metro_line-delete').click(function () {
    var self = $(this);
    var id = self.data('id');
    $.ajax({
        url: $('meta[name="base-url"]').attr('content') + "/admin/metro_line/" + id,
        method: 'DELETE',
        data: { '_token': $('meta[name="csrf-token"]').attr('content') }
    }).done(function () {
        $("#metro_line_row_" + id).slideUp();
        iziToast.success({
            title: 'Deleted!',
            message: ''
        });
    });

});

$('.metro_line-edit').click(function () {
    var self = $(this);
    var id = self.data('id');
    var metro_line_name = $("#metro_line_row_" + id + " .metro_line-name").text();
    var metro_line_city_id = $("#metro_line_row_" + id + " .metro_line-city").data('city_id');
    $(".modal-metro_line-name").text(metro_line_name);
    $("#editModalForm").attr("action", $('meta[name="base-url"]').attr('content') + "/admin/metro_line/" + id);
    $("#new-metro_line-name").val(metro_line_name);
    $("#option_" + metro_line_city_id).prop('selected', true);

});
