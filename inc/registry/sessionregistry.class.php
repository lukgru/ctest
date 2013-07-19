<?php
/*
 * Handle session access
 */
namespace inc\registry;

class sessionRegistry extends \inc\registry\Registry
{
    private static $instance;
    
    protected function __construct()
    {
        session_start();
    }

    public function set($key, $value)
    {
	$_SESSION["registry"][$key] = $value;
    }

    public function get($key)
    {
	return isset($_SESSION["registry"][$key]) ? $_SESSION["registry"][$key] : false;
    }

    public function check($key)
    {
	return ($this->get($key) !== false);
    }

    public function getInstance()
    {
	if (!self::$instance)
	{
	    self::$instance = new self();
	}
	return self::$instance;
    }
}
?>
