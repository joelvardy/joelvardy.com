<?php

require(__DIR__ . '/init.php');

$app = new \Slim\Slim([
    'templates.path' => VIEWS_PATH
]);

return $app;
