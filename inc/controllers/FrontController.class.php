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
        try
        {
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

    static function appInit()
    {
        date_default_timezone_set("Europe/Warsaw");
        
    }

    static function dbInit()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=cargomedia", "cargomedia", "cargomedia", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        \inc\registry\ApplicationRegistry::getInstance()->set("pdo", $pdo);
    }

    static function smartyInit()
    {
        require_once \inc\registry\ApplicationRegistry::getInstance()->get("ROOT_DIR")."libs/Smarty-3.1.14/libs/Smarty.class.php";

        $smarty = new Smarty;
        $smarty->template_dir = "templates/";
        $smarty->compile_dir = "templates_c/";
        $smarty->compile_check = true;
        $smarty->error_reporting = E_ALL;
        $smarty->debugging = false;

        \inc\registry\ApplicationRegistry::getInstance()->set("smarty", $smarty);
    }

}

?>