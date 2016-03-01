<?php

$app = require(dirname(__DIR__) . '/app.php');

// Load routes
foreach (glob(ROUTES_PATH . '/*.php') as $route) {
    require($route);
}

$app->run();
