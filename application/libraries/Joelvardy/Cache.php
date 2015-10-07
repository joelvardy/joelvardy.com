<?php

namespace Joelvardy;

class Cache
{

    protected $memcached = false;

    /**
     * Return Memcached object
     */
    protected function memcached($host = '127.0.0.1', $port = 11211)
    {

        if (!$this->memcached) {
            $this->memcached = new \Memcached();
            $this->memcached->addServer($host, $port);
        }

        return $this->memcached;

    }

    /**
     * Return value key, or run callback and save result
     */
    public function remember($key, callable $callback, $ttl = 0)
    {

        if ($this->memcached()->get($key)) {
            return $this->memcached()->get($key);
        }

        $result = $callback();

        $this->memcached()->add($key, $result, $ttl);

        return $result;

    }

}
