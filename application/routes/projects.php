<?php

use Joelvardy\Template;

$routes->get('/projects', function () {

	// Initialise classes
	$template = new Template();

	// Render each project view
	$data['projects'] = array();
	foreach (array_reverse(glob(VIEWS_PATH.'/projects/*.php')) as $project) {
		$data['projects'][] = $template->render('projects/'.pathinfo($project)['basename'], array(), true);
	}

	// Render the page
	$template->render('projects.php', $data);

});