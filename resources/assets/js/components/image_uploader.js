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
                // Errors list in modal window
                //$('.modal').modal('show');
            },
            success: function (img) {
                if (img.url) {
                    $('#image_change').attr('src', prop.path_avatar + img.url);
                    $('.bg-profile').css({
                        'background-image': 'url(' + prop.path_cover + img.url + ')',
                        'background-position': 'center center'
                    });
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
            'upload_avatar': {
                url:         '/image_upload',
                path_avatar: '/uploads/images/normals/',
                path_cover:  '/uploads/images/covers/'
            }
        }
    };

    this.getUrl = function (id) {
        return this.dict[id];
    };

    this.dict = this.getConfig();
};
