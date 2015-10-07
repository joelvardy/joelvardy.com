<?php

use Joelvardy\View;

$app->get('/workspace', function () use ($app) {

    echo View::template('default.php', [
        'slug' => 'workspace',
        'title' => 'Workspace of a Web Developer',
        'description' => 'Some details and evolution of my lifehacker-featured workspace.',
        'openGraph' => (object)[
            'url' => '/workspace',
            'type' => 'article',
        ]
    ], 'workspace.php');

});
