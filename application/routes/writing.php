<?php

use Joelvardy\View;
use Joelvardy\Writing;

$app->get('/writing', function () use ($app) {

	echo View::template('default.php', [
		'slug' => 'writing-list',
		'title' => 'The Writings of a Software Engineer',
		'description' => 'Articles, tutorials, and opinions written by Joel Vardy about various web development topics.',
		'posts' => Writing::posts()
	], 'writing-list.php');

});

$app->get('/writing/:postSlug', function ($slug) use ($app) {

	$post = Writing::read($slug);
	if ( ! $post) $app->notFound();

	echo View::template('default.php', [
		'slug' => 'writing-post',
		'title' => $post->title,
		'description' => strip_tags($post->intro)
	], 'writing/'.$post->filename);

});
