<?php

namespace Joelvardy;

class Cache
{

    protected $memcached;

    public function __construct(string $host = null, integer $port = null)
    {
        $this->memcached = new \Memcached();
        $this->memcached->addServer(($host ?: '127.0.0.1'), ($port ?: 11211));
    }

    public function remember(string $key, callable $callback, integer $ttl = null)
    {

        if ($this->memcached->get($key)) {
            return $this->memcached->get($key);
        }

        $result = $callback();

        $this->memcached->add($key, $result, ($ttl ?: 0));

        return $result;

    }

}
