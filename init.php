<?php

// Set PHP timezone
date_default_timezone_set('Europe/London');

// Set some paths
define('BASE_PATH', realpath(dirname(__FILE__)));
define('CACHE_PATH', BASE_PATH . '/cache');
define('APP_PATH', BASE_PATH . '/app');
define('ROUTES_PATH', APP_PATH . '/routes');
define('VIEWS_PATH', APP_PATH . '/views');

// Composer autoloding
require(BASE_PATH . '/vendor/autoload.php');
