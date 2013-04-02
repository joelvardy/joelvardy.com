<?php

/**
 * Config class
 *
 * @author	Joel Vardy <info@joelvardy.com>
 */

namespace Joelvardy;

class Config {


	/**
	 * Configuration values
	 */
	private static $values;


	/**
	 * Get/set configuration value
	 *
	 * @return	mixed
	 */
	public static function value($key, $value = null) {

		// Set the value
		if ($value) {
			self::$values[$key] = $value;
			return;
		}

		return self::$values[$key];

	}


}