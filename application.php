<?php

require(__DIR__.'/initialisation.php');

$app = new \Slim\Slim([
	'templates.path' => VIEWS_PATH
]);

return $app;
