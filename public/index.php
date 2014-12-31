<?php

require('../initialisation.php');

$routes = new Joelvardy\Routes();

// Load application routes
foreach (glob(ROUTES_PATH.'/*.php') as $route) {
	require($route);
}

$routes->run();
