<?php

/**
 * Writing library
 *
 * Several methods for returning posts
 */

namespace Joelvardy;

class Writing
{

    /**
     * Generate a slug from title
     */
    protected function generateSlug($title)
    {
        $title = strtolower($title);
        $title = preg_replace('/[^a-z0-9-]/', '-', $title);
        $title = preg_replace('/-+/', '-', $title);
        return trim($title, '-');
    }

    /**
     * Return array of posts
     */
    public function posts()
    {

        $cache = new Cache();

        return $cache->remember('posts', function () {

            $posts = [];

            foreach (glob(VIEWS_PATH . '/writing/*.php') as $post) {

                $postFilename = pathinfo($post)['basename'];
                $postHtml = View::render('writing/' . $postFilename);
                $postDom = \Sunra\PhpSimple\HtmlDomParser::str_get_html($postHtml);

                $postTitle = $postDom->find('h2', 0)->innertext;
                $postSlug = $this->generateSlug($postTitle);
                $postDate = strtotime($postDom->find('date', 0)->innertext);

                // Ensure the posted date has passed
                if ($postDate < $_SERVER['REQUEST_TIME']) {
                    $posts[$postSlug] = (object)array(
                        'slug' => $postSlug,
                        'filename' => $postFilename,
                        'title' => $postTitle,
                        'posted' => $postDate,
                        'intro' => strip_tags($postDom->find('p', 0)->innertext)
                    );
                }

            }

            // Sort posts by posted date
            uasort($posts, function ($a, $b) {
                return $a->posted <= $b->posted;
            });

            return $posts;

        });

    }

    /**
     * Return a post
     */
    public function read($slug)
    {
        $posts = self::posts();
        return (isset($posts[$slug]) ? $posts[$slug] : false);
    }

}
