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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css').sourceMaps();


//Copiar directorio Vendor
mix.copy('resources/vendor/animsition/animsition.min.css', 'public/css/vendor/animsition.min.css');
mix.copy('resources/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css', 'public/css/vendor/bootstrap-progressbar-3.3.4.min.css');
mix.copy('resources/vendor/wow/animate.css', 'public/css/vendor/animate.css');
mix.copy('resources/vendor/css-hamburgers/hamburgers.min.css', 'public/css/vendor/hamburgers.min.css');
mix.copy('resources/vendor/slick/slick.css', 'public/css/vendor/slick.css');
mix.copy('resources/vendor/select2/select2.min.css', 'public/css/vendor/select2.min.css');
mix.copy('resources/vendor/perfect-scrollbar/perfect-scrollbar.css', 'public/css/vendor/perfect-scrollbar.css');


//Estilos de CoolAdmin
//Theme
mix.styles([
    'resources/css/bootstrap-datetimepicker.min.css',
    'resources/css/font-face.css',
    'resources/css/theme.css'
], 'public/css/theme.css');


//Copiar directorio fonts
mix.copyDirectory('resources/fonts', 'public/fonts');
mix.copyDirectory('resources/vendor/font-awesome-4.7', 'public/fonts/font-awesome-4.7');
mix.copyDirectory('resources/vendor/font-awesome-5', 'public/fonts/font-awesome-5');
mix.copyDirectory('resources/vendor/mdi-font', 'public/fonts/mdi-font');

//Copiar script main
mix.copyDirectory('resources/js/main.js', 'public/js/main.js');
