<?php

namespace Framework;

use Framework\Kernel;
use Framework\Request;

class Application implements \ArrayAccess
{
    private $bindings;

    public function __construct($basePath)
    {
        $this->basePath = $basePath;
    }

    public function make($class)
    {
        return $this->bind($class, new $class);
    }

    public function run()
    {
        $kernel = $this->make(Kernel::class);
        $response = $kernel->handle($this->make(Request::class));
        $response->send();
    }

    public function bind($key, $object)
    {
        return $this[$key] = $object;
    }

    public function offsetGet($key)
    {
        return $this->bindings[$key];
    }

    public function offsetSet($key, $object)
    {
        $this->bindings[$key] = $object;
    }

    public function offsetUnset($key)
    {
        unset($this->bindings[$key]);
    }

    public function offsetExists($key)
    {
        return isset($this->bindings[$key]);
    }
}