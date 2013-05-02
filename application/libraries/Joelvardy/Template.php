<?php

/**
 * Template class
 *
 * @author	Joel Vardy <info@joelvardy.com>
 */

namespace Joelvardy;

class Template {


	/**
	 * Render template
	 *
	 * @param	string [$string] The filename under the views path
	 * @param	array|null [$data] The data to be passed to the view
	 * @param	boolean [$return_view] Should the view be returned by the method
	 * @return	string|stdoutput	Dependant on value of $return_view
	 */
	public function render($view, $data = array(), $return_view = false) {

		// Cast data as an array
		$data = (array) $data;

		// Extract data into variables
		extract($data, EXTR_SKIP|EXTR_REFS);

		// Allow the template library to be accessed from the view
		$template =& $this;

		// Render the view HTML into a variable
		ob_start();
		require(VIEWS_PATH.'/'.$view);
		$view_html = ob_get_clean();

		// Return view HTML
		if ($return_view) {
			return $view_html;
		}

		echo $view_html;

	}


}