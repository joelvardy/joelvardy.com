<?php

namespace Joelvardy;

class Cache {


    /**
     * Remember result and return if saved
     *
     * @return	mixed
     */
    protected static $memcached = false;
    protected static function memcached($host = '127.0.0.1', $port = 11211) {

        if ( ! static::$memcached) {
            static::$memcached = new \Memcached();
            static::$memcached->addServer($host, $port);
        }

        return static::$memcached;

    }


    /**
     * Remember result and return if saved
     *
     * @return	mixed
     */
    public static function remember($key, callable $callback, $ttl = 0) {

        $memcached = static::memcached();

        if ($memcached->get($key)) return $memcached->get($key);

        $result = $callback();

        $memcached->add($key, $result, $ttl);

        return $result;

    }


}
