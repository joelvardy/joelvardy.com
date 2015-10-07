<?php

/**
 * Writing library
 *
 * @author	Joel Vardy <info@joelvardy.com>
 */

namespace Joelvardy;

class Writing {


	/**
	 * Generate a slug from title
	 *
	 * @return	string
	 */
	protected static function generate_slug($title) {

		$title = strtolower($title);
		$title = preg_replace('/[^a-z0-9-]/', '-', $title);
		$title = preg_replace('/-+/', '-', $title);
		return trim($title, '-');

	}


	/**
	 * Return list of posts
	 *
	 * @return	array
	 */
	public static function posts() {

        $cache = new Cache();

        return $cache->remember('posts', function() {

            $posts = [];

            foreach (array_reverse(glob(VIEWS_PATH.'/writing/*.php')) as $post) {

                $post_filename = pathinfo($post)['basename'];
                $html = View::render('writing/'.$post_filename);
                $dom = \Sunra\PhpSimple\HtmlDomParser::str_get_html($html);

                $post_title = $dom->find('h2', 0)->innertext;
                $post_slug = self::generate_slug($post_title);
                $post_date = strtotime($dom->find('date', 0)->innertext);
                $post_intro = strip_tags($dom->find('p', 0)->innertext);

                // Ensure the posted date has passed
                if ($post_date < $_SERVER['REQUEST_TIME']) {
                    $posts[$post_slug] = (object) array(
                        'slug' => $post_slug,
                        'filename' => $post_filename,
                        'title' => $post_title,
                        'posted' => $post_date,
                        'intro' => $post_intro
                    );
                }

            }

            // Sort values by posted date
            uasort($posts, function($a, $b) {
                return $a->posted - $b->posted;
            });
            $posts = array_reverse($posts);

            return $posts;

        });

	}


	/**
	 * Return a post
	 *
	 * @return	object|boolean
	 */
	public static function read($slug) {

		$posts = self::posts();
		return (isset($posts[$slug]) ? $posts[$slug] : false);

	}


}
