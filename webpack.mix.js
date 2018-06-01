let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app.js', 'public/js')
    .js('resources/assets/js/admin/admin.js', 'public/js/admin')
    .js('resources/assets/js/admin/components/image_uploader.js', 'public/js/admin/components')
    .js('resources/assets/js/admin/components/jq_minicolors.js', 'public/js/admin/components')
    .js('resources/assets/js/admin/components/jq_hotkeys.js', 'public/js/admin/components')
    .js('resources/assets/js/admin/components/wysiwyg.js', 'public/js/admin/components')
    // Front
    //.js('resources/assets/js/main_menu.js', 'public/js/components')
    .js('resources/assets/js/components/util.js', 'public/js/components')
    .js('resources/assets/js/components/modal.js', 'public/js/components')
    .js('resources/assets/js/components/modal-ajax.js', 'public/js/components')
    .js('resources/assets/js/components/likes.js', 'public/js/components')
    .js('resources/assets/js/components/comments.js', 'public/js/components')
    .js('resources/assets/js/components/image_uploader.js', 'public/js/components')
    .js('resources/assets/js/components/main_menu.js', 'public/js/components')
    .js('resources/assets/js/components/jq_hotkeys.js', 'public/js/components')
    .js('resources/assets/js/components/wysiwyg.js', 'public/js/components')
    //
    .sass('resources/assets/sass/app.scss', 'public/css')
    // COMPONENTS
    .sass('resources/assets/sass/components/likes.scss', 'public/css/components')
    .sass('resources/assets/sass/components/views.scss', 'public/css/components')
    .sass('resources/assets/sass/components/comments.scss', 'public/css/components')
    // ADMIN
    .sass('resources/assets/sass/admin/admin.scss', 'public/css/admin')
    .sass('resources/assets/sass/admin/components/jq_minicolors.scss', 'public/css/admin/components');
