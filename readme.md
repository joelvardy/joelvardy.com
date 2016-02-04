# [joelvardy.com][joelvardy]

This is the code which powers my personal website.

With a recent refactor of the website I moved from using my own custom routing, templating, to using the [Slim Framework][slim].

## Development

```
composer install
npm install
vagrant up
```

### SCSS and JavaScript

You can minify JavaScript and compile SCSS by running gulp:

```
gulp # Compile once
gulp watch # Compile and watch for changes
```

## Application

### Libraries

Most of the libraries I am using are loaded by Composer (see the `/composer.json` file) - however within the `/app/libraries/Joelvardy` directory there are a few application specific libraries.

### Routes

All files in the `/app/routes` directory are loaded into the application.

### Views

The `/app/views` directory contains the HTML with makes up the website, under this folder are project / writing partials.

All requests (which are not valid resources) are routed to the `/public/index.php` file, this file loads all of the routes, the matching route will have a callback which is then executed.

Developed by [Joel Vardy][joelvardy].

  [joelvardy]: https://joelvardy.com/
  [slim]: http://www.slimframework.com
