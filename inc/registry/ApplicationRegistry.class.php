<?php
/*
 * Handle base application settings
 */
namespace inc\registry;

class ApplicationRegistry extends \inc\registry\Registry
{
    private static $instance;
    private $properties = array();

    public function set($key, $value)
    {
	$this->properties[$key] = $value;
    }

    public function get($key)
    {
	return isset($this->properties[$key]) ? $this->properties[$key] : null;
    }

    public function check($key)
    {
	return ($this->get($key) !== null);
    }
    
    public function getInstance()
    {
        if(!self::$instance)
        {
            self::$instance = new self();
        }

        return self::$instance;
    }
}
?>
