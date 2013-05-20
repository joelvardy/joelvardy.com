<?php

use Joelvardy\Template;

$routes->get('/workspace', function () {

	// Initialise classes
	$template = new Template();

	// Render the page
	$template->render('workspace.php');

});