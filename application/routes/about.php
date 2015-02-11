<?php

use Joelvardy\View;

$app->get('/', function () use ($app) {

	echo View::template('default.php', [
		'slug' => 'about',
		'title' => 'Joel Vardy - Contract Software Engineer in the UK',
		'description' => 'I\'m a contract Software Engineer with more than 4 years experience in OOP PHP &#38; JS serving the UK. View projects I have been involved in.'
	], 'about.php');

});
