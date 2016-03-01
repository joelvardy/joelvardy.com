<?php

$app->get('/projects', function ($request, $response, $args) {

    $projects = [];
    foreach (array_reverse(glob(VIEWS_PATH . '/projects/*.twig')) as $project) {
        $projects[] = 'projects/' . pathinfo($project)['basename'];
    }

    return $this->view->render($response, 'projects.twig', [
        'slug' => 'projects',
        'title' => 'Contract, Freelance & Personal Projects By Joel Vardy',
        'description' => 'View my recent development projects including PHP websites, JavaScript driven applications, libraries and more!',
        'openGraph' => (object)[
            'url' => '/projects',
            'type' => 'website',
        ],
        'projects' => $projects
    ]);

})->setName('projects');
