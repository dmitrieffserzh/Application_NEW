
// IMAGE UPLOADER
$(document).ready(function () {
    $('#image_input').on('change', function () {

        $('#spinner').addClass('spinner-on');

        var form = new FormData();
        var image = $(this)[0].files[0];
        form.append('image', image);

        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            url: '/image_upload',
            data: form,
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            error: function error(_error) {},
            success: function success(msg) {

                $('#image_change').attr('src', '/uploads/images/normals/' + msg.url);
            },
            complete: function complete(msg) {

                console.log(msg);

                $('#spinner').removeClass('spinner-on');
            }
        });
    });
    //event.preventDefault();
});