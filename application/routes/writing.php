<?php

use Joelvardy\View;
use Joelvardy\Writing;

$app->get('/writing', function () use ($app) {

	echo View::template('default.php', [
		'slug' => 'writing-list',
		'title' => 'The Writings of a Web Developer',
		'description' => 'Articles, tutorials, and opinions written by Joel Vardy about various web development topics.',
		'openGraph' => (object) [
			'url' => '/writing',
			'type' => 'website',
		],
		'posts' => Writing::posts()
	], 'writing-list.php');

});

$app->get('/writing/:postSlug', function ($slug) use ($app) {

	$post = Writing::read($slug);
	if ( ! $post) $app->notFound();

	echo View::template('default.php', [
		'slug' => 'writing-post',
		'title' => $post->title,
		'description' => strip_tags($post->intro),
		'openGraph' => (object) [
			'url' => '/writing/'.$post->slug,
			'type' => 'article',
		],
		'post' => View::render('writing/'.$post->filename)
	], 'writing-post.php');

});
