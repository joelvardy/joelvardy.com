+++
date = "2013-06-26T00:00:00+00:00"
draft = false
title = "RESTful Routes"
+++

A Composer package which allows you to easily map routes to a block of code. This is an ideal base for small websites and RESTful APIs.

**Update:** this is not a perfect library, you may want to consider using the <a href="http://www.slimframework.com/" title="a micro framework for PHP" data-analytics="Slim framework">Slim micro framework</a>, which is usually what I now find myself using.

### Requiring the Package
I'm not going to explain how to use composer, if you are not sure then <a href="http://getcomposer.org/doc/00-intro.md" title="Getting started with Composer" data-analytics="Composer manual">read the manual</a>.

Open your <code class="language-markup">composer.json</code> file and require the routes package.
```markup
"require": {
    "joelvardy/routes": "v1.1"
}
```
Then ensure you run the composer update command.

### Instantiating the Library
Ensure you have the composer autoloading setup, then you just need to instantiate the library by adding <code class="language-php">$routes = new Joelvardy\Routes();</code> - at this point your file should look something like:
```php
// Autoload Composer
require('vendor/autoload.php');

// Instantiate routes library
$routes = new Joelvardy\Routes();

echo 'Hello Routes!';
```

### Adding a Route
Now we are going to add a route to create a new user account, because we are creating something we will **POST** to our API endpoint.
```php
$routes->post('/user', function () {

    // Add the user to the database
    $user->create($_POST['username'], $_POST['password'], $_POST['email']);

});
```
As you might imagine you can use a different REST method by substituting <code class="language-php">$routes->post(</code> with any of the accepted methods: **GET**, **POST**, **PUT**, **PATCH**, and **DELETE**.

### Regular Expressions
You will generally have dynamic routes for example, the URI in your browser at the moment ends **/writing/restful-routes** usually you will want to grab that *slug* and read an item from your database which is associated with it.

You can do this using regular expressions, for example:
```php
$routes->get('/user/([a-zA-Z0-9-_]+)', function ($username) {

    // Check the username exists
    if ( ! $users->read_by_username($username)) return false;
    
    echo 'Read specific user, username: '.$username;

});
```

### Custom 404 Error
In the above example you can see we check whether the user exists, and if not we return false. Returning false from the anonymous function will cause a 404 error to be returned.

We can add a special route which is run if no routes are matched, or if a matching route returns false.
```php
$routes->notFound(function () {
    echo 'Error 404 :(';
});
```

### Running the Routes
After adding the routes you must run <code class="language-php">$routes->run();</code> this is easily forgotten, but without it none of the routes will run.

### Use It!
So, there you have it, you can view the Composer package on <a href="https://packagist.org/packages/joelvardy/routes" title="RESTful routes package" data-analytics="RESTful routes package">Packagist</a> - or you can look at the code on <a href="https://github.com/joelvardy/routes" title="RESTful routes repository" data-analytics="RESTful routes repo">GitHub</a> which has a complete usage example.
