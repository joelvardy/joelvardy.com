<?php

use Joelvardy\Template;
use Joelvardy\Output;

$routes->get('/projects', function () {

	// Render each project view
	$projects = array();
	foreach (array_reverse(glob(VIEWS_PATH.'/projects/*.php')) as $project) {
		$projects[] = Template::build('projects/'.pathinfo($project)['filename'])->render();
	}

	echo Output::page(array(
		'template' => 'templates/default',
		'slug' => 'projects',
		'title' => 'Contract, Freelance &#38; Personal Web Projects By Joel Vardy',
		'description' => 'View my recent development projects including PHP websites, JavaScript driven applications, libraries and more!'
	), Template::build('projects')->data('projects', $projects));

});
