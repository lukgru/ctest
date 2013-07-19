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

    public function setErrorNo($error_no)
    {
        $this->error_no = (int)$error_no;
    }
}

?>