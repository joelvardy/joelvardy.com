<?php

$app->get('/writing', function ($request, $response, $args) {

    return $this->view->render($response, 'writing-list.twig', [
        'slug' => 'writing-list',
        'title' => 'The Writings of a Web Developer',
        'description' => 'Articles, tutorials, and opinions written by Joel Vardy about various web development topics.',
        'openGraph' => (object)[
            'url' => '/writing',
            'type' => 'website',
        ],
        'posts' => $this->writing->posts()
    ]);

})->setName('writing.list');

$app->get('/writing/{postSlug}', function ($request, $response, $args) {

    $post = $this->writing->read($args['postSlug']);
    if (!$post) {
        return $response->withStatus(404);
    }

    return $this->view->render($response, 'writing-post.twig', [
        'slug' => 'writing-post',
        'title' => $post->title,
        'description' => strip_tags($post->intro),
        'openGraph' => (object)[
            'url' => '/writing/' . $post->slug,
            'type' => 'article',
        ],
        'post' => $post
    ]);

})->setName('writing.post');
