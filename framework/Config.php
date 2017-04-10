<?php

namespace Framework;

class Config
{
    private static $items = [];

    public static function get($key)
    {
        return self::$items[$key];
    }

    public static function load($path)
    {
        foreach (glob($path.'/*') as $file) {
            self::$items[basename($file, '.php')] = include $file;
        }
    }
}