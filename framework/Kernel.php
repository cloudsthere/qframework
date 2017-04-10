<?php

namespace Framework;

class Kernel
{
    public function __construct()
    {
        
    }

    public function handle($request)
    {
        $response = (new $request->controller)->{$request->action}();
        return new Response($response);
    }
}