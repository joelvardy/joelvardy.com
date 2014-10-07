<?php

use Joelvardy\Writing;

$routes->get('/manifest', function () {

	// Initialise classes
	$writing = new Writing();

	header('Content-Type: text/cache-manifest');

	function files($directory, $type = false) {
		$list = array();
		foreach (glob(BASE_PATH.'/public/assets'.$directory.'/*') as $path) {
			if (is_dir($path)) {
				$list = array_merge($list, files($directory.'/'.pathinfo($path, PATHINFO_BASENAME), $type));
				continue;
			}
			if ($type && pathinfo($path, PATHINFO_EXTENSION) != $type) continue;
			$list[] = '/assets'.$directory.'/'.pathinfo($path, PATHINFO_BASENAME);
		}
		return $list;
	}

	// Read all posts
	$writingPosts = $writing->readPosts();

	// Read all assets
	$fonts = files('/font');
	$images = array_merge(files('/img', 'jpg'), files('/writing', 'jpg'));

	require(VIEWS_PATH.'/offline.php');

});
