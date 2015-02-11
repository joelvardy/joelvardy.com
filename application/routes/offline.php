<?php

use Joelvardy\Writing;

$app->get('/manifest', function () use ($app) {

	// Only allow manifest on joelvardy.com domain
	if ($_SERVER['SERVER_NAME'] !== 'joelvardy.com') {
		$app->notFound();
	}

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
	$writing_posts = Writing::posts();

	// Read all assets
	$fonts = files('/font');
	$images = array_merge(files('/img', 'jpg'), files('/writing', 'jpg'));

	require(VIEWS_PATH.'/offline.php');

});
