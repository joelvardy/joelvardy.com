<?php

require(__DIR__ . '/init.php');

$container = new \Slim\Container([
    'settings' => [
        'displayErrorDetails' => false,
    ],
]);

// Use Twig templating engine
$container['view'] = function ($container) {

    $view = new \Slim\Views\Twig(VIEWS_PATH, [
        'cache' => CACHE_PATH
    ]);

    $view->addExtension(new \Slim\Views\TwigExtension(
        $container['router'],
        $container['request']->getUri()
    ));

    // Load a resources object into all views to allow versioned CSS and JS to be loaded in layout template
    $resources = json_decode(file_get_contents(BASE_PATH . '/public/assets/build/rev-manifest.json'), true);
    $view->getEnvironment()->addGlobal('resources', (object)[
        'css' => $resources['css/design.css'],
        'js' => $resources['js/main.js']
    ]);

    return $view;

};

// 404 Not Found
$container['notFoundHandler'] = function ($container) {
    return function ($request, $response) use ($container) {
        return $container['view']->render($response, '404.twig', [
            'slug' => 'error-404',
            'title' => 'Houston, we\'ve had a problem - 404',
            'description' => 'This page could not be found.'
        ])->withStatus(404);
    };
};

// Writing library
$container['writing'] = function () {
    return new \Joelvardy\Writing();
};

return new \Slim\App($container);
