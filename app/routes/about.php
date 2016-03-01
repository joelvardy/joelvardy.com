<?php

$app->get('/', function ($request, $response, $args) {

    return $this->view->render($response, 'about.twig', [
        'slug' => 'about',
        'title' => 'Joel Vardy - Web Developer Available For Work in the UK',
        'description' => 'I\'m a contract / freelance Web Developer with years of experience in OOP PHP &amp; JavaScript working the UK. View projects I have been involved in.',
        'openGraph' => (object)[
            'url' => '/',
            'type' => 'website',
        ]
    ]);

})->setName('about');
