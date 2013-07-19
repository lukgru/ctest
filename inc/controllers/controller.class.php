<?php
namespace inc\controllers;

abstract class Controller
{
    final public function __construct()
    {
        
    }
    
    abstract function actIndex();
}
?>