<?php

use Joelvardy\Writing;

$routes->get('/manifest', function () {

	// Initialise classes
	$writing = new Writing();

	header('Content-Type: text/cache-manifest');

	function files($directory) {
		$list = array();
		foreach (glob(BASE_PATH.'/public/assets'.$directory.'/*') as $path) {
			if (is_dir($path)) {
				$list = array_merge($list, files($directory.'/'.pathinfo($path)['basename']));
				continue;
			}
			$list[] = '/assets'.$directory.'/'.pathinfo($path)['basename'];
		}
		return $list;
	}

	// Read all posts
	$writingPosts = $writing->readPosts();

	// Read all assets
	$fonts = files('/font');
	$images = files('/img');
	$images = array_merge($images, files('/writing'));

	require(VIEWS_PATH.'/offline.php');

});
