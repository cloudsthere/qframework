<?php

use Framework\Application;

function dump($content)
{
    echo '<pre>';
    var_dump($content);
    echo '</pre>';
}

function app($alias = '')
{
    $app = Application::getInstance();
    return $alias ? $app[$alias] : $app;
}