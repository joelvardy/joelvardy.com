<?php

use Joelvardy\Template;

$routes->notFound(function () {

	// Initialise classes
	$template = new Template();

	// Render the page
	$template->render('404.php');

});