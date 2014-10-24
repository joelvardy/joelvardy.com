# [joelvardy.com][joelvardy]

This is the code which powers my personal website.

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

### Vagrant

To run the development server ensure Vagrant is installed, and run:

```
vagrant up
```

## Application

### Configurations

All configurations are located in the `/application/config` directory, I have defined the path to this as `CONFIG_PATH` - each file within this folder will be loaded into the Config library which means the values can be accessed anywhere within the application.

### Libraries

Most of the libraries I am using are loaded by Composer (see the `/composer.json` file) - however within the `/application/libraries/Joelvardy` directory there are a few application specific libraries.

### Routes

All files in the `/application/routes` directory are loaded into the application, these files each contain routes which are mapped using my own [RESTful routing library][routes].

### Views

The `/application/views` directory contains PHP files which are generally speaking accessed using my Template library; this allows data to be passed to views, views to be embedded ect.

All requests (which are not valid resources) are routed to the `/public/index.php` file, this file loads all of the routes, the matching route will have a callback which is then executed.

[Joel Vardy][joelvardy]

  [joelvardy]: https://joelvardy.com/
  [routes]: https://packagist.org/packages/joelvardy/routes
