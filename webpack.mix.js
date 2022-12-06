const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .css('resources/css/helper.css', 'public/css/helper.css')
    .css('resources/css/ws.css', 'public/css')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);

mix.options({
    hmrOptions: {
        host: 'http://127.0.0.1',
        port: 8080,
    }
})
