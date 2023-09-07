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

mix
	.setPublicPath('./public')
	.js('./resources/js/script.js', './public/js/')
	.sass('./resources/sass/style.scss', './public/css/')
	.options({
		processCssUrls: false
	})
	.browserSync({
		proxy: 'portfolio-v1.local',
		notify: false
	})
	.version();
