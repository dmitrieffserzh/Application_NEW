// IMAGE UPLOADER
$(document).ready(function () {
    $('#image_input').on('change', function () {

        $('#spinner').addClass('spinner-on');

        var form = new FormData();
        var image = $(this)[0].files[0];
        form.append('image', image);

        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: url,
            data: form,
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            error: function (error) {
            },
            success: function (img) {

                $('#image_change').attr('src', img_puth + img.url);
                $('#image_input_hidden').val(img.url);
            },
            complete: function (img) {

            }
        });
        $('#spinner').removeClass('spinner-on');
    });
    //event.preventDefault();
});