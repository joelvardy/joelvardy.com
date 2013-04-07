<?php

use Joelvardy\Template;
use Joelvardy\Flickr;

$routes->get('/workspace', function () {

	// Initialise classes
	$template = new Template();
	$flickr = new Flickr();

	// Read photos
	$data['photos'] = $flickr->readSet('72157624035451737');

	// Render the page
	$template->render('workspace.php', $data);

});