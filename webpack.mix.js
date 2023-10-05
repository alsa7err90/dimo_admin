let mix = require('laravel-mix');

 mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .copy(
        'node_modules/@fortawesome/fontawesome-free/webfonts',
        'public/webfonts'
    )
    .postCss('resources/css/app.css', 'public/css', [
        require("tailwindcss"),
    ]);
