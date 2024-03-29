const {
	mix
} = require('laravel-mix');
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
mix.copy('node_modules/raphael/raphael.js', 'resources/assets/js/libs')
	.copy('node_modules/morris.js/morris.js', 'resources/assets/js/libs')
	.copy('node_modules/morris.js/morris.css', 'public/css')
	.copy('node_modules/fullcalendar/dist/fullcalendar.css', 'public/css/calendar')
	.copy('node_modules/fullcalendar/dist/fullcalendar.print.css', 'public/css/calendar')
	.copy('node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.css', 'public/css/libs')
	.copy('node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js', 'public/js/libs')
	.copy('node_modules/clockpicker/dist/bootstrap-clockpicker.css', 'public/css/libs')
	.copy('node_modules/clockpicker/dist/bootstrap-clockpicker.js', 'public/js/libs')
	.copy('node_modules/jquery-sparkline/jquery.sparkline.min.js', 'public/js/libs')

	.babel(['resources/assets/custom/com/index.js'], 'public/js/com/index.js')
	.babel(['resources/assets/custom/com/showclient.js'], 'public/js/com/showclient.js')
	.babel(['resources/assets/custom/com/clients.js'], 'public/js/com/clients.js')

	.babel(['resources/assets/custom/op/index.js'], 'public/js/op/index.js')
	.babel(['resources/assets/custom/op/showclient.js'], 'public/js/op/showclient.js')

	.babel(['resources/assets/custom/mark/index.js'], 'public/js/mark/index.js')
	.babel(['resources/assets/custom/mark/singleshowroom.js'], 'public/js/mark/singleshowroom.js')

	.babel(['resources/assets/custom/main.js'], 'public/js/main.js')

	.sass('resources/assets/sass/app.scss', 'public/css')
	.js('resources/assets/js/app.js', 'public/js')

	.scripts([
		'resources/assets/js/libs/raphael.js',
	 	'resources/assets/js/libs/morris.js'],
	  'public/js/charting.js')

	.scripts([
		'resources/assets/elite/libs/jquery.slimscroll.js',
	 	'resources/assets/elite/libs/waves.js', 'resources/assets/elite/libs/toast.js',
	  	'resources/assets/elite/libs/custom.min.js'],
	   'public/js/plugins.js')
	.styles([
		'resources/assets/elite/css/animate.css',
	  	'resources/assets/elite/css/toast.css',
	 	'resources/assets/elite/css/style.css',
	 	'resources/assets/elite/css/blue.css', 
	  	'resources/assets/elite/css/spinners.css',
	    'resources/assets/elite/css/changes.css'],
	    'public/css/main.css')
	
	.copy('node_modules/datatables/media/js/jquery.dataTables.min.js',
	 'public/js/datatables.js')
	.copy('node_modules/datatables/media/css/jquery.dataTables.min.css',
	 'public/css/datatables.css')
	.autoload({})
	.options({ purifyCss: true });
