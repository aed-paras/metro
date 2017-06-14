$('.media-delete').click(function () {
    var self = $(this);
    var id = self.attr('data-id');
    $.ajax({
        url: $('meta[name="base-url"]').attr('content') + "/admin/media/" + id,
        method: 'DELETE',
        data: { '_token': $('meta[name="csrf-token"]').attr('content') }
    }).done(function () {
        $("#media_row_" + id).slideUp();
        deleteNotification();
    });
});
$('.media-edit').click(function () {
    var self = $(this);
    var id = self.data('id');
    var media_name = $("#media_row_" + id + " .media-name").text();
    $(".modal-media-name").text(media_name);
    $("#editModalForm").attr("action", $('meta[name="base-url"]').attr('content') + "/admin/media/" + id);
    $("#new-media-name").val(media_name);
});
