<?php

namespace inc\views;

class MainView extends View
{

    public function __construct()
    {
        parent::__construct();
    }

    public function render()
    {
        $this->smarty->assign("users", \inc\Users::getUsers());
        $this->smarty->assign("body_content", $this->smarty->fetch("main.tpl"));
        
        parent::render();
    }
}

?>