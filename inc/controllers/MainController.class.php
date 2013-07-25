<?php
/**
 * Main site actions manager
 */
namespace inc\controllers;

class MainController extends Controller
{
    public function actIndex()
    {
        $mainView = new \inc\views\MainView();
        $mainView->display();
    }
}

?>