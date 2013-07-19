<?php
/**
 * Handle memcached access
 */
namespace inc\registry;

class MemcachedRegistry extends \inc\registry\Registry
{
    private static $instance;
    private $memcached;
    
    protected function __construct()
    {
        $this->memcached = new \Memcached("aslkdj");
        $this->memcached->addServer('localhost', 11211);
    }

    public function set($key, $value)
    {
	return $this->memcached->add($key, $value);
    }
    
    public function get($key)
    {
	return $this->memcached->get($key);
    }

    public function check($key)
    {
	return ($this->memcached->get($key) !== false);
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