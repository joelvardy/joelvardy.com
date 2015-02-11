<?php

/**
 * View library
 *
 * This library simply wraps around the view handler baked into the Slim framework allowing views to be returned, and allowing views within a template.
 *
 * @author	Joel Vardy <info@joelvardy.com>
 */

namespace Joelvardy;

class View {


	/**
	 * Return HTML rather than echo
	 *
	 * @return	string
	 */
	public static function render($filename, $data = []) {

		$app = \Slim\Slim::getInstance();

		ob_start();
		$app->render($filename, $data);
		return ob_get_clean();

	}


	/**
	 * Render a view within a template
	 *
	 * Add <?php echo $page_view; ?> in the template file where the view will be rendered
	 *
	 * @return	string
	 */
	public static function template($template, $data, $view) {

		$data['page_view'] = self::render($view, $data);
		return self::render('templates/'.$template, $data);

	}


}
