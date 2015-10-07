<?php

use Joelvardy\View;

$app->notFound(function () use ($app) {

    echo View::template('default.php', [
        'slug' => 'error-404',
        'title' => 'Houston, we\'ve had a problem - 404',
        'description' => 'This page could not be found.'
    ], '404.php');

});
