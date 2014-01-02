<?php

use Joelvardy\Output;

$routes->get('/workspace', function () {

	echo Output::page(array(
		'template' => 'templates/default',
		'slug' => 'workspace',
		'title' => 'Workspace of a PHP Developer',
		'description' => 'An overview of my lifehacker-featured workspace.'
	), 'workspace');

});
