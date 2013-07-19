<?php

namespace inc\registry;

abstract class Registry
{
    protected function __construct()
    {
        
    }
    
    abstract function set($key, $value);
    abstract function get($key);
    abstract function check($key);
    abstract function getInstance();

}

?>