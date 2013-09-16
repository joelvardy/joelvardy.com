<?php

use Joelvardy\Template;
use Joelvardy\Writing;

$routes->get('/writing', function () {

	// Initialise classes
	$writing = new Writing();

	echo Template::build('writing-list')->data('posts', $writing->readPosts());

});

$routes->get('/writing/([a-z0-9-]+)', function ($slug) {

	// Initialise classes
	$writing = new Writing();

	$postDetails = $writing->readPost($slug);

	// Ensure the post exists
	if ( ! $postDetails) return false;

	$data['meta_title'] = $postDetails->title;
	$data['meta_description'] = $postDetails->intro;
	$data['post'] = Template::build('writing/'.$postDetails->filename)->render();

	echo Template::build('writing-post')->data($data);

});