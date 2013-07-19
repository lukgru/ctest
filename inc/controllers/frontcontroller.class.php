<?php

/**
 * Front controller design pattern
 * Used to have only one point of contact with request
 * 
 */
class frontController
{

    private function __construct()
    {
        
    }

    static function run()
    {
        require_once 'init/appstart.php';

        try
        {
            require_once 'init/db_conn.php';
            require_once 'init/smarty.php';
            
            $request = \inc\registry\requestRegistry::getInstance();

            //resolve controller file name
            $controllerName = $request->get("cmd") ? $request->get("cmd") : "main";
            $controllerFileName = mb_convert_case($controllerName, MB_CASE_LOWER)."Controller.class.php";

            //check is controller file exist
            if(!file_exists(\inc\registry\applicationRegistry::getInstance()->get("CONTROLLERS_DIR").$controllerFileName))
            {
                throw new RuntimeException("Page doesn't exist.", 1);
            }

            $controllerName = "\inc\controllers\\".$controllerName."Controller";

            $controller = new $controllerName;

            //check is action to execute
            if($request->get("action"))
            {
                $method = "act".$request->get("action");

                //check is controller have action
                if(!method_exists($controller, $method))
                {
                    throw new RuntimeException("Action doesn't exist.", 2);
                }

                $controller->{$method}();
            }
            else
            {
                $controller->actIndex();
            }
        }
        catch(RuntimeException $ex)
        {
            $controller = new \inc\controllers\ErrorController();
            $controller->setException($ex);
            $controller->actIndex();
        }
    }

}

?>