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

//mix.js('resources/js/app.js', 'public/js')
    mix.sass('resources/sass/main.sass', 'public/css').options({
        processCssUrls: false,
    });
    //mix.sass('resources/sass/blog-article.sass', 'public/css')
    //mix.sass('resources/sass/blog.sass', 'public/css')
    //mix.sass('resources/sass/login.sass', 'public/css')
    //mix.sass('resources/sass/portfolio.sass', 'public/css');
    //mix.sass('resources/sass/portfolio-work.sass','public/css')
    //mix.sass('resources/sass/bootstrap.sass', 'public/css');
