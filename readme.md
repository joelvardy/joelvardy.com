# [joelvardy.com][joelvardy]

This is the code which powers my personal website.

General changes:

 * Was a custom built (albeit basic) framework with a few libraries
 * Rebuilt using [Slim Framework][slim] version 2
 * Updated to [Slim Framework][slim] version 3

## Development

```
composer install
npm install
php vendor/bin/homestead make
vim Homestead.yaml
vagrant up
```

### SCSS and JavaScript

I am using the Laravel Elixir NPM package to manage SCSS, JS compilation and generate a versioned build file.

```
gulp
gulp --production
```

## Production

```
composer install
# Ensure ./cache is writable
```

Developed by [Joel Vardy][joelvardy].

  [joelvardy]: https://joelvardy.com/
  [slim]: http://www.slimframework.com
