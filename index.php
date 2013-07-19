<?php

try
{
    /*
     * autoloader is here because it not available on CLI mode
     */
    function my_autoloader($class)
    {
        if(file_exists(str_replace("\\", "/", $class).'.class.php'))
        {
            require_once str_replace("\\", "/", $class).'.class.php';
        }
    }

    spl_autoload_register('my_autoloader');
    
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