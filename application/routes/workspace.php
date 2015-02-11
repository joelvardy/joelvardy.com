<?php

use Joelvardy\View;

$app->get('/workspace', function () use ($app) {

	echo View::template('default.php', [
		'slug' => 'workspace',
		'title' => 'Workspace of a Software Engineer',
		'description' => 'An overview of my lifehacker-featured workspace.'
	], 'workspace.php');

});
