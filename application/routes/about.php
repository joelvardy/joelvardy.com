<?php

use Joelvardy\Template;
use Joelvardy\Flickr;

$routes->get('/', function () {

	// Initialise classes
	$template = new Template();
	$flickr = new Flickr();

	// Read photos
	$data['photos'] = $flickr->readSet('72157633145964383');

	// Render the page
	$template->render('about.php', $data);

});