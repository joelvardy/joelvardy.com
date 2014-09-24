<?php

/**
 * Output library
 *
 * @author	Joel Vardy <info@joelvardy.com>
 */

namespace Joelvardy;

class Output {


	/**
	 * Build wiew within a template
	 *
	 * @return	string
	 */
	public function page($template_data, $view) {

		$template = (object) array(
			'path' => Config::value('template')->views_directory.'/'.$template_data['template'].'.php',
			'slug' => $template_data['slug'],
			'title' => $template_data['title'],
			'description' => $template_data['description']
		);

		// Allow a pre-built template to be passed as view
		if (gettype($view) == 'string') {
			$view = Template::build($view);
		}
		$page_html = $view->render();

		ob_start();
		require($template->path);
		return ob_get_clean();

	}


}
