<?php

/**
 * Cache class
 *
 * @author	Joel Vardy <info@joelvardy.com>
 */

namespace Joelvardy;

class Cache {


	/**
	 * Memcached instance
	 */
	private static $memcached;


	/**
	 * Get memcached instance
	 *
	 * @return	object|boolean
	 */
	protected static function memcached() {

		// Check the extension is available
		if ( ! extension_loaded('memcached')) return false;

		// If the memcached instance has not been defined
		if (self::$memcached == null) {

			// Create a new instance
			self::$memcached = new \Memcached();
			if ( ! self::$memcached->addServer(Config::value('memcached')->host, 11211)) {
				return false;
			}

		}

		// Return instance
		return self::$memcached;

	}


	/**
	 * Return key
	 *
	 * @param	string [$key] The key of the cached file
	 * @return	string
	 */
	protected static function key($key) {

		return Config::value('memcached')->key_prefix.$key;

	}


	/**
	 * Save data to the cache
	 *
	 * @param	string [$key] The key of the cached file
	 * @param	mixed [$value] The value to cache
	 * @param	integer [$ttl] The number of seconds until the cache expires
	 * @return	boolean
	 */
	public static function set($key, $value, $ttl = 0) {

		// Ensure memcached is available
		if ( ! self::memcached()) return false;

		return self::memcached()->set(self::key($key), $value, $ttl);

	}


	/**
	 * Get data from the cache
	 *
	 * @param	string [$key] The key of the cached file
	 * @return	mixed
	 */
	public static function get($key) {

		// Ensure memcached is available
		if ( ! self::memcached()) return false;

		return self::memcached()->get(self::key($key));

	}


	/**
	 * Delete data in cache
	 *
	 * @param	string [$key] The key of the cached file
	 * @return	boolean
	 */
	public static function delete($key) {

		// Ensure memcached is available
		if ( ! self::memcached()) return false;

		return self::memcached()->delete(self::key($key));

	}


}