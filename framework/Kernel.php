<?php

namespace Framework;

class Kernel
{
    public function __construct()
    {
        
    }

    public function handle($request)
    {
        return new Response('hehe');
    }
}