const mix = require('laravel-mix');

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
mix.styles([
	'public/css/bootstrap.css',
	'public/css/dataTables.bootstrap4.css',
	'public/css/responsive.bootstrap4.css'
],
'public/css/hasil_combine.css'
).version();
mix.scripts([
	'public/js/jquery.dataTables.js',
	'public/js/dataTables.bootstrap4.js',
	'public/js/dataTables.responsive.js',
	'public/js/jquery-3.5.1.js',
	'public/js/responsive.bootstrap4.js'
],
'public/js/hasil_combine.js').version();
mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');
