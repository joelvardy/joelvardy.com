<?php

namespace Joelvardy;

class Writing
{

    protected function generateSlug($title)
    {
        $title = strtolower($title);
        $title = preg_replace('/[^a-z0-9-]/', '-', $title); // Replace non alphanumeric characters with hyphen
        $title = preg_replace('/-+/', '-', $title); // Remove multiple hyphens which are together
        return trim($title, '-'); // Remove hyphens from the beginning and end of the slug
    }

    public function posts()
    {

        $cache = new Cache();

        return $cache->remember('posts', function () {

            $posts = [];

            foreach (glob(VIEWS_PATH . '/writing/*.twig') as $post) {

                $postHtml = file_get_contents($post);
                $postDom = \Sunra\PhpSimple\HtmlDomParser::str_get_html($postHtml);

                $postTitle = $postDom->find('h2', 0)->innertext;
                $postSlug = $this->generateSlug($postTitle);
                $postDate = strtotime($postDom->find('date', 0)->innertext);

                // Ensure the posted date has passed
                if ($postDate > time()) {
                    continue;
                }

                $posts[$postSlug] = (object)[
                    'filename' => 'writing/' . pathinfo($post)['basename'],
                    'slug' => $postSlug,
                    'title' => $postTitle,
                    'posted' => $postDate,
                    'intro' => strip_tags($postDom->find('p', 0)->innertext)
                ];

            }

            // Sort posts by posted date
            uasort($posts, function ($a, $b) {
                return $a->posted <= $b->posted;
            });

            return $posts;

        });

    }

    public function read($slug)
    {
        $posts = self::posts();
        return (isset($posts[$slug]) ? $posts[$slug] : false);
    }

}
