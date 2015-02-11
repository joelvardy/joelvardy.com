<?php

use Joelvardy\View;

$app->get('/projects', function () use ($app) {

	// Render each project view
	$projects = array();
	foreach (array_reverse(glob(VIEWS_PATH.'/projects/*.php')) as $project) {
		$projects[] = View::render('projects/'.pathinfo($project)['basename']);
	}

	echo View::template('default.php', [
		'slug' => 'projects',
		'title' => 'Contract, Freelance &#38; Personal Projects By Joel Vardy',
		'description' => 'View my recent development projects including PHP websites, JavaScript driven applications, libraries and more!',
		'projects' => $projects
	], 'projects.php');

});
