let mix = require('laravel-mix');

mix.sass('src/scss/lib.scss', 'dist/css');
mix.sass('src/scss/style.scss', 'dist/css');
mix.sass('src/scss/responsive.scss', 'dist/css');

mix.js('src/js/script.js','dist/js');