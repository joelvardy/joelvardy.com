<?php

$app = require(__DIR__.'/../application.php');

// Load routes
foreach (glob(ROUTES_PATH.'/*.php') as $route) {
	require($route);
}

$app->run();
