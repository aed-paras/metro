var baseURL = $('meta[name="base-url"]').attr('content');
var csrf = $('meta[name="csrf-token"]').attr('content');


function deleteNotification() {
    iziToast.success({
        title: 'Deleted!',
        message: ''
    });
}