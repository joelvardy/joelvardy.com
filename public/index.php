<?php

// Include the initialisation file
require('../initialisation.php');

// Initialise routes
$routes = new Joelvardy\Routes();

// Homepage
$routes->get('/', function () {

    echo 'Homepage';

});

// If no other routes match
$routes->notFound(function () {

    echo 'Error 404 :(';

});

// Run routes
$routes->run();