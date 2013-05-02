<?php

use Joelvardy\Template;
use Joelvardy\Writing;

$routes->get('/writing', function () {

	// Initialise classes
	$template = new Template();
	$writing = new Writing();

	$data['posts'] = $writing->readPosts();

	// Render the page
	$template->render('writing-list.php', $data);

});

$routes->get('/writing/([a-z0-9-]+)', function ($slug) {

	// Initialise classes
	$template = new Template();
	$writing = new Writing();

	$postDetails = $writing->readPost($slug);

	// Ensure the post exists
	if ( ! $postDetails) return false;

	$data['meta_title'] = $postDetails->title;
	$data['meta_description'] = $postDetails->intro;
	$data['post'] = $template->render('writing/'.$postDetails->filename, array(), true);

	// Render the page
	$template->render('writing-post.php', $data);

});