const {mix} = require('laravel-mix');

mix
    .setPublicPath('./static')
    .scripts([
        './assets/js/vendor/analytics.js',
        './assets/js/vendor/prism.js',
        './assets/js/vendor/starts-with.js',
        './assets/js/vendor/scroller.js',
    ], 'static/javascript/vendor.js')
    .js('./assets/js/app.js', 'javascript')
    .sass('./assets/sass/design.scss', 'css')
    .version();
