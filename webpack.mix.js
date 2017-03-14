const { mix } = require('laravel-mix');

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
   .js('resources/assets/js/op/showclient.js', 'public/js/op')
   .js('resources/assets/js/com/showroom.js', 'public/js/com')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .autoload({});


//       .scripts([
//     'resources/assets/js/moment/moment.min.js.js',
//     'resources/assets/js/calendar/fullcalendar.min.js'
// ], 'public/js/calendar.js');