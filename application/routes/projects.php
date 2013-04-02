<?php

use Joelvardy\Template;

$routes->get('/projects', function () {

	// Initialise classes
	$template = new Template();

	$data['projects'] = array(
		array(
			'title' => 'Project 1'
		),
		array(
			'title' => 'Project 2'
		)
	);

	// Render the page
	$template->render('projects.php', $data);

});