<div class="post">

    <h2>RESTful Routes</h2>
    <h4 class="date">Posted: <date>26th June 2013</date></h4>

    <p>A Composer package which allows you to easily map routes to a block of code. This is an ideal base for small websites and RESTful APIs.</p>

    <p><strong>Update:</strong> this is not a perfect library, you may want to consider using the <a href="http://www.slimframework.com/" title="a micro framework for PHP" data-analytics="Slim framework">Slim micro framework</a>, which is usually what I now find myself using.</p>

    <h3>Requiring the Package</h3>
    <p>I'm not going to explain how to use composer, if you are not sure then <a href="http://getcomposer.org/doc/00-intro.md" title="Getting started with Composer" data-analytics="Composer manual">read the manual</a>.</p>
    <p>Open your <code class="language-markup">composer.json</code> file and require the routes package.</p>
<pre><code class="language-markup">"require": {
    "joelvardy/routes": "v1.1"
}</code></pre>
    <p>Then ensure you run the composer update command.</p>

    <h3>Instantiating the Library</h3>
    <p>Ensure you have the composer autoloading setup, then you just need to instantiate the library by adding <code class="language-php">$routes = new Joelvardy\Routes();</code> - at this point your file should look something like:</p>
<pre><code class="language-php">// Autoload Composer
require('vendor/autoload.php');

// Instantiate routes library
$routes = new Joelvardy\Routes();

echo 'Hello Routes!';</code></pre>

    <h3>Adding a Route</h3>
    <p>Now we are going to add a route to create a new user account, because we are creating something we will <strong>POST</strong> to our API endpoint.</p>
<pre><code class="language-php">$routes->post('/user', function () {

    // Add the user to the database
    $user->create($_POST['username'], $_POST['password'], $_POST['email']);

});</code></pre>
    <p>As you might imagine you can use a different REST method by substituting <code class="language-php">$routes->post(</code> with any of the accepted methods: <strong>GET</strong>, <strong>POST</strong>, <strong>PUT</strong>, <strong>PATCH</strong>, and <strong>DELETE</strong>.</p>

    <h3>Regular Expressions</h3>
    <p>You will generally have dynamic routes for example, the URI in your browser at the moment ends <strong>/writing/restful-routes</strong> usually you will want to grab that <em>slug</em> and read an item from your database which is associated with it.</p>
    <p>You can do this using regular expressions, for example:</p>
<pre><code class="language-php">$routes->get('/user/([a-zA-Z0-9-_]+)', function ($username) {

    // Check the username exists
    if ( ! $users->read_by_username($username)) return false;

    echo 'Read specific user, username: '.$username;

});</code></pre>

    <h3>Custom 404 Error</h3>
    <p>In the above example you can see we check whether the user exists, and if not we return false. Returning false from the anonymous function will cause a 404 error to be returned.</p>
    <p>We can add a special route which is run if no routes are matched, or if a matching route returns false.</p>
<pre><code class="language-php">$routes->notFound(function () {

    echo 'Error 404 :(';

});</code></pre>

    <h3>Running the Routes</h3>
    <p>After adding the routes you must run <code class="language-php">$routes->run();</code> this is easily forgotten, but without it none of the routes will run.</p>

    <h3>Use It!</h3>
    <p>So, there you have it, you can view the Composer package on <a href="https://packagist.org/packages/joelvardy/routes" title="RESTful routes package" data-analytics="RESTful routes package">Packagist</a> - or you can look at the code on <a href="https://github.com/joelvardy/routes" title="RESTful routes repository" data-analytics="RESTful routes repo">GitHub</a> which has a complete usage example.</p>

</div>
