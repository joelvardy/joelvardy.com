<?php

use Joelvardy\Template;

$routes->get('/projects', function () {

	// Render each project view
	$projects = array();
	foreach (array_reverse(glob(VIEWS_PATH.'/projects/*.php')) as $project) {
		$projects[] = Template::build('projects/'.pathinfo($project)['filename'])->render();
	}

	echo Template::build('projects')->data('projects', $projects);

});
