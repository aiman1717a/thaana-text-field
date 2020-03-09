let mix = require('laravel-mix');

mix
  .setPublicPath('dist')
  .js('resources/js/field.js', 'js')
  .sass('resources/sass/field.scss', 'css');

mix.copy('node_modules/jquery/dist/jquery.js', 'dist/js/jquery.js');
