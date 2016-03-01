<?php

$app->get('/workspace', function ($request, $response, $args) {

    return $this->view->render($response, 'workspace.twig', [
        'slug' => 'workspace',
        'title' => 'Workspace of a Web Developer',
        'description' => 'Some details and evolution of my lifehacker-featured workspace.',
        'openGraph' => (object)[
            'url' => '/workspace',
            'type' => 'article',
        ]
    ]);

})->setName('workspace');
