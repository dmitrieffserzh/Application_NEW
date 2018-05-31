// IMAGE UPLOADER
$(function () {

    uplodImage = function (e) {

        var settings = new settingsUploads();
        var prop     = settings.getUrl($(e).data('upload-type'));

        var form     = new FormData();
        var image    = $(e)[0].files[0];
        form.append('image', image);

        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: prop.url,
            data: form,
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            beforeSend: function () {
                $('#spinner').addClass('spinner-on');
            },
            error: function (error) {
            },
            success: function (img) {
                if (img.url) {
                    $('#image_change').attr('src', prop.path + img.url);
                    $('#image_input_hidden').val(img.url);
                }
            },
            complete: function () {
                $('#spinner').removeClass('spinner-on');
            }
        });
    };
});

var settingsUploads = function () {

    this.getConfig = function () {
        return {
            'create_news': {
                url:  '/admin/upload',
                path: '/uploads/images/news/'
            }
        }
    };

    this.getUrl = function (id) {
        return this.dict[id];
    };

    this.dict = this.getConfig();
};
