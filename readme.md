# [joelvardy.com][joelvardy]

This is the code which powers my personal website.

## Configurations

All configurations are located in the `/application/config` directory, I have defined the path to this as `CONFIG_PATH` - each file within this folder will be loaded into the `Config` library which means the values can be accessed anywhere within the application.

## Libraries

Most of the libraries I am using are loaded by composer because I use them in multiple projects (see the `composer.json` file) - however within the `/application/libraries/Joelvardy` directory there is a writing library, I have no need to use this elsewhere, so it is within the codebase, and uses the Composer autoloader.

## Routes

All files in the `/application/routes` directory are loaded into the application, these files each contain routes which are mapped using my own [RESTful routing library][routes].

## Views

The `/application/views` directory contains PHP files which are generally speaking accessed using my `Template` library; this allows data to be passed to views, views to be embedded ect..

## All Together Now

The `/initialisation.php` file defines paths, autoloading, and loads the configurations.

All requests (which are not valid resources) are routed to the `/public/index.php` file, this file loads all of the routes, the matching route will have a callback which is then executed.

## Development

### SASS

I am using Compass to compile SASS into CSS, during development compass can watch for changed SASS files by running this command in the project root:

```bash
compass watch
```

[Joel Vardy][joelvardy]

  [joelvardy]: https://joelvardy.com/
  [routes]: https://packagist.org/packages/joelvardy/routes
