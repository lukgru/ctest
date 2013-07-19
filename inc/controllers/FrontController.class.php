<?php

/**
 * Front controller design pattern
 * Used to have only one point of contact with request
 * 
 */
class FrontController
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
            
            $request = \inc\registry\RequestRegistry::getInstance();

            //resolve controller file name
            $controllerName = $request->get("cmd") ? mb_convert_case($request->get("cmd"), MB_CASE_TITLE) : "Main";

            //check is controller file exist
            if(!file_exists(\inc\registry\ApplicationRegistry::getInstance()->get("CONTROLLERS_DIR").$controllerName."Controller.class.php"))
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