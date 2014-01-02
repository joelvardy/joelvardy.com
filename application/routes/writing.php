<?php

use Joelvardy\Template;
use Joelvardy\Output;
use Joelvardy\Writing;

$routes->get('/writing', function () {

	// Initialise classes
	$writing = new Writing();

	echo Output::page(array(
		'template' => 'templates/default',
		'slug' => 'writing-list',
		'title' => 'The Writings of a PHP Developer',
		'description' => 'Articles, tutorials, and opinions written by Joel Vardy about various web development topics.'
	), Template::build('writing-list')->data('posts', $writing->readPosts()));

});

$routes->get('/writing/([a-z0-9-]+)', function ($slug) {

	// Initialise classes
	$writing = new Writing();

	$postDetails = $writing->readPost($slug);

	// Ensure the post exists
	if ( ! $postDetails) return false;

	echo Output::page(array(
		'template' => 'templates/default',
		'slug' => 'writing-post',
		'stylesheets' => array(
			'/assets/css/vendor/prism.css'
		),
		'scripts' => array(
			'/assets/js/vendor/prism.js'
		),
		'title' => $postDetails->title,
		'description' => strip_tags($postDetails->intro)
	), Template::build('writing-post')->data('post', Template::build('writing/'.$postDetails->filename)->render()));

});
