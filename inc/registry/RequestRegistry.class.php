<?php
/**
 * Request
 * We dont use direct access to GET, POST etc., we use for this class Request
 * Thanks to this solution we can later manipulate http request, add parameters, filters parameters etc.
 */
namespace inc\registry;

class RequestRegistry extends \inc\registry\Registry
{
    private static $instance;
    private $properties = array();

    protected function __construct()
    {
        $this->properties = $_REQUEST;
    }
    
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
