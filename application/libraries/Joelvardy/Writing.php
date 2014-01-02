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
	public function generateSlug($title) {

		$title = strtolower($title);
		$title = preg_replace('/[^a-z0-9-]/', '-', $title);
		$title = preg_replace('/-+/', '-', $title);
		return trim($title, '-');

	}


	/**
	 * Read list of posts
	 *
	 * @return	array
	 */
	public function readPosts() {

		// Read from cache
		$posts = Cache::fetch('writing_posts');
		if ( ! empty($posts)) return $posts;

		$posts = array();

		foreach (array_reverse(glob(VIEWS_PATH.'/writing/*.php')) as $post) {

			$postFile = pathinfo($post);
			$html = Template::build('writing/'.$postFile['filename'])->render();
			$dom = \Sunra\PhpSimple\HtmlDomParser::str_get_html($html);

			$postTitle = $dom->find('h2', 0)->innertext;
			$postSlug = $this->generateSlug($postTitle);
			$postDate = strtotime($dom->find('date', 0)->innertext);
			$postIntro = $dom->find('p', 0)->innertext;

			// Ensure the posted date has passed
			if ($postDate < $_SERVER['REQUEST_TIME']) {
				$posts[$postSlug] = (object) array(
					'slug' => $postSlug,
					'filename' => $postFile['filename'],
					'title' => $postTitle,
					'posted' => $postDate,
					'intro' => $postIntro
				);
			}

		}

		// Sort values by posted date
		uasort($posts, function($a, $b) {
			return $a->posted - $b->posted;
		});
		$posts = array_reverse($posts);

		// Save in cache for 5 minutes
		Cache::store('writing_posts', $posts, (60 * 5));

		return $posts;

	}


	/**
	 * Read a post
	 *
	 * @return	object|boolean
	 */
	public function readPost($postSlug) {

		$posts = $this->readPosts();
		return (isset($posts[$postSlug]) ? $posts[$postSlug] : false);

	}


}
