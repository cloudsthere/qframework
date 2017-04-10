<?php

namespace Framework;

use Framework\Config;
use Framework\DB;
use Framework\Kernel;
use Framework\Request;

class Application implements \ArrayAccess
{
    private $bindings;
    private static $instance;

    public function __construct($basePath)
    {
        $this->basePath = $basePath;
        self::$instance = $this;
        Config::load($this->configPath());
    }

    public function make($class, $alias = '')
    {
        return $this->bind($alias ? : $class, new $class);
    }

    public function run()
    {
        $kernel = $this->make(Kernel::class);
        $response = $kernel->handle($this->make(Request::class));
        $response->send();
    }

    public function configPath($path = '')
    {
        return $this->basePath.'/config'. ($path ? '/'.$path : '');
    }

    public static function getInstance()
    {
        return self::$instance;
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