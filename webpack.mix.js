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
mix.disableNotifications();

mix.js('resources/assets/js/app.js', 'public/js')
   .copy('node_modules/raphael/raphael.js', 'resources/assets/js/libs')
   .copy('node_modules/morris.js/morris.js', 'resources/assets/js/libs')
   .copy('node_modules/morris.js/morris.css', 'public/css')
   .copy('node_modules/fullcalendar/dist/fullcalendar.css', 'public/css/calendar')
   .copy('node_modules/fullcalendar/dist/fullcalendar.print.css', 'public/css/calendar')
   .js('resources/assets/js/op/showclient.js', 'public/js/op')
   .js('resources/assets/js/com/showroom.js', 'public/js/com')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .scripts([
    'resources/assets/js/libs/raphael.js',
    'resources/assets/js/libs/morris.js'
	], 'public/js/charting.js')
   .autoload({});
