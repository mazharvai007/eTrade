
/*
************************
* Require Gulp
* ************************
 */
var gulp = require('gulp');

/*
************************
* Require laravel-elixir
* ************************
 */
var elixir = require('laravel-elixir');
elixir.config.sourcemaps = false;

elixir(function (mix) {
    // Compile sass to css
    mix.sass('resources/assets/sass/app.sass', 'resources/assets/css');

    var bowerPath = 'bower/vendor';

    // Combine css file
    mix.styles(
        [
            'css/app.css',
            bowerPath + '/slick-carousel/slick/slick.css'
        ], 'public/css/all.css', // Output file
        'resources/assets');
    mix.scripts(
        [
            // jQuery
            bowerPath + '/jquery/dist/jquery.min.js',

            // Foundation JS
            bowerPath + 'foundation-sites/dist/js/foundation.min.js',

            // Other dependencies
            bowerPath + '/slick-carousel/slick/slick.min.js'
        ], 'public/js/all.js', 'resources/assets');
});