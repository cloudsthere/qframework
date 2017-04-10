<?php

namespace Framework;

class Request
{
    public function __construct()
    {
        $this->parseRequestUri();
        $this->get = $_GET;
        $this->post = $_POST;
        $this->input = array_merge($this->get, $this->post);
    }

    public function parseRequestUri()
    {
        $this->uri = $_SERVER['REQUEST_URI'];
        @list($this->path, $this->queryString) = explode('?', $this->uri);

        $paths = array_merge(array_filter(explode('/', $this->path)));
        $this->controller = '\App\Controllers\\'.ucfirst($paths[0]) . 'Controller';
        $this->action = $paths[1];
    }
}
