<?php

namespace Framework;

class Request
{
    public function __construct()
    {
        $this->parseRequestUri();
        $this->get = $_GET;
        echo '<pre>';
        var_dump($_SERVER);
        var_dump($_GET);
    }

    public function parseRequestUri()
    {
        $this->uri = $_SERVER['REQUEST_URI'];
        if (strpos($this->uri, '?') !== false) {
            
        }
    }
}