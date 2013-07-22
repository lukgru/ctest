<?php
/**
 * Cache class
 * Thanks this solution we can simply change cache engine
 */
namespace inc\core;

class Cache
{
    static public function get()
    {
        //Remember the cache engine must inherit the Registry
        return \inc\registry\ApplicationRegistry::getInstance();
    }
}
?>