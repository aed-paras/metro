$(".metro_line_block").click(function () {
    var metro_line_id = $(this).data('id');
    window.location.href = baseURL + "/metro_line/" + metro_line_id;
});