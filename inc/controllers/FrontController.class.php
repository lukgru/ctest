<?php

/**
 * Front controller design pattern
 * Used to have only one point of contact with request
 * 
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
            self::autoloaderInit();
            self::appInit();
            self::dbInit();
            self::smartyInit();

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

    /**
     * Autoload class file
     */
    static function autoloaderInit()
    {
        if(!function_exists("lukgru_autoloader"))
        {
            function lukgru_autoloader($class)
            {
                if(file_exists(dirname(dirname(dirname(__FILE__)))."/".str_replace("\\", "/", $class).'.class.php'))
                {
                    require_once dirname(dirname(dirname(__FILE__)))."/".str_replace("\\", "/", $class).'.class.php';
                }
            }

            spl_autoload_register('lukgru_autoloader');
        }
    }

    /**
     * Application init
     * Read config file
     */
    static function appInit()
    {
        $appRegistry = \inc\registry\ApplicationRegistry::getInstance();

        date_default_timezone_set("Europe/Warsaw");


        //check if exist local config file, if exist load settings else check if exist original config file and load settings
        if(file_exists($appRegistry->get("ROOT_DIR")."inc/config/config_local.yml"))
        {
            require_once $appRegistry->get("ROOT_DIR")."libs/spyc-master/Spyc.php";

            $config = Spyc::YAMLLoad($appRegistry->get("ROOT_DIR")."inc/config/config_local.yml");
        }
        elseif(file_exists($appRegistry->get("ROOT_DIR")."inc/config/config.yml"))
        {
            require_once $appRegistry->get("ROOT_DIR")."libs/spyc-master/Spyc.php";

            $config = Spyc::YAMLLoad($appRegistry->get("ROOT_DIR")."inc/config/config.yml");
        }

        if(isset($config) && is_array($config))
        {
            foreach($config as $key => $value)
            {
                $appRegistry->set($key, $value);
            }
        }
    }

    /**
     * Databse initialize
     * @throws RuntimeException
     */
    static function dbInit()
    {
        $appRegistry = \inc\registry\ApplicationRegistry::getInstance();

        if(!$appRegistry->check("database_host") || !$appRegistry->check("database_name") || !$appRegistry->check("database_user") || !$appRegistry->check("database_pass"))
        {
            throw new RuntimeException("Can't connect to database.", 1);
        }

        $pdo = new PDO("mysql:host=".$appRegistry->get("database_host").";dbname=".$appRegistry->get("database_name"), $appRegistry->get("database_user"), $appRegistry->get("database_pass"), array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        $appRegistry->set("pdo", $pdo);
    }

    /**
     * Smarty initialize
     */
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