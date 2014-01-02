<?php

use Joelvardy\Output;

$routes->get('/', function () {

	echo Output::page(array(
		'template' => 'templates/default',
		'slug' => 'about',
		'title' => 'Joel Vardy - Contract PHP Developer in the UK',
		'description' => 'I\'m a contract PHP developer with more than 4 years experience in OOP PHP &#38; JS serving the UK. View projects I have been involved in.'
	), 'about');

});
