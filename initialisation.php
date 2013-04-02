<?php

// Set error reporting
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Start user session
session_start();

// Set PHP timezone
date_default_timezone_set('Europe/London');

// Set some paths
define('BASE_PATH', realpath(dirname(__FILE__)));

// Setup Composer autoloding
require(BASE_PATH.'/vendor/autoload.php');