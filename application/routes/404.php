<?php

use Joelvardy\Output;

$routes->notFound(function () {

	echo Output::page(array(
		'template' => 'templates/default',
		'slug' => 'error-404',
		'title' => 'Houston, we\'ve had a problem - 404',
		'description' => 'This page could not be found.'
	), '404');

});
