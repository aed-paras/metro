$('.city-delete').click(function () {
    var self = $(this);
    var id = self.data('id');
    $.ajax({
        url: $('meta[name="base-url"]').attr('content') + "/admin/city/" + id,
        method: 'DELETE',
        data: { '_token': $('meta[name="csrf-token"]').attr('content') }
    }).done(function () {
        $("#city_row_" + id).slideUp();
        deleteNotification();
    });

});

$('.city-edit').click(function () {
    var self = $(this);
    var id = self.data('id');
    var city_name = $("#city_row_" + id + " .city-name").text();
    $(".modal-city-name").text(city_name);
    $("#modal-city-id").val(id);
    $("#new-city-name").val(city_name);
});
