<?php

use Joelvardy\Template;

$routes->get('/', function () {

	// Initialise classes
	$template = new Template();

	// Render the page
	$template->render('about.php');

});