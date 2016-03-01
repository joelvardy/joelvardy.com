var elixir = require('laravel-elixir');

elixir.config.assetsPath = 'assets';
elixir.config.publicPath = 'public/assets';
elixir.config.css.sass.folder = 'scss';

elixir(function (mix) {

    mix.sass('design.scss');

    mix.browserify('main.js');

    mix.version(['css/design.css', 'js/main.js']);

});
