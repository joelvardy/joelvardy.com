# [joelvardy.com][joelvardy]

This is the code which powers my personal website.

With a recent refactor of the website I moved from using my own custom routing, templating, to using the [Slim Framework][slim]. 

## Development

### Packages

Install PHP dependencies with composer:

```
composer install
```

Install JavaScript dependencies with npm:

```
npm install
```

### SASS and JavaScript

Ensure packages are installed:

```
sudo gem install sass
npm install -g gulp
```

You can minify JavaScript and compile SASS by running gulp:

```
gulp watch
```

You can also check JavaScript using:

```
gulp lint
```

## Application

### Libraries

Most of the libraries I am using are loaded by Composer (see the `/composer.json` file) - however within the `/application/libraries/Joelvardy` directory there are a few application specific libraries.

### Routes

All files in the `/application/routes` directory are loaded into the application.

### Views

The `/application/views` directory contains the HTML with makes up the website, under this folder are project / writing partials.

All requests (which are not valid resources) are routed to the `/public/index.php` file, this file loads all of the routes, the matching route will have a callback which is then executed.

Developed by [Joel Vardy][joelvardy].

  [joelvardy]: https://joelvardy.com/
  [slim]: http://www.slimframework.com
