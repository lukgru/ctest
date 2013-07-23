<?php

try
{
    require_once 'inc/controllers/FrontController.class.php';
    //one point of contact with request
    FrontController::run();
}
catch(Exception $ex)
{
    echo "An unexpected error occurred.";
    exit;
}
?>