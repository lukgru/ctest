<?php

namespace inc\views;

abstract class View
{

    /**
     * Smarty
     * @var Smarty
     */
    protected $smarty = null;

    /**
     * Template file name
     * @var string
     */
    protected $template = "index.tpl";

    protected $cssFiles = array();
    
    protected $jsFiles = array();
    
    protected $jsPostloadsFiles = array();
    
    protected $views = array();
    
    public function __construct()
    {
        if(!(\inc\registry\ApplicationRegistry::getInstance()->get("smarty") instanceof \Smarty))
        {
            throw new \Exception("Required object Smarty doesn't exist.", 1);
            exit;
        }
        
        $this->smarty = \inc\registry\ApplicationRegistry::getInstance()->get("smarty");
        $this->addCssFiles("/script/css/style.css");
    }

    protected function render()
    {
        if(isset($this->cssFiles[0]))
        {
            $this->smarty->assign("cssFiles", $this->cssFiles);
        }
        
        if(isset($this->jsFiles[0]))
        {
            $this->smarty->assign("jsFiles", $this->jsFiles);
        }
        
        if(count($this->views) > 0)
        {
            foreach($this->views as $name => $view)
            {
                $view->render();
                $this->smarty->assign($name, $view->fetch());
            }
        }
        
        if(isset($this->jsPostloadsFilesFiles[0]))
        {
            $this->smarty->assign("jsPostloadFiles", $this->jsPostloadsFiles);
        }
    }

    public function display()
    {
        $this->render();
        $this->smarty->display($this->template);
    }

    public function fetch()
    {
        $this->render();
        return $this->smarty->fetch($this->template);
    }

    /**************************************************************************/
    /**************************************************************************/
    /**************************************************************************/
    
    public function setTemplate($template)
    {
        $this->template = $template;
    }
    
    public function addView($name, \views\View $view)
    {
        $this->views[$name] = $view;
    }

    public function addCssFiles($href, $type = "text/css", $media = null)
    {
        if(empty($href))
        {
            throw new \InvalidArgumentException("CSS file is incorrect.", 1);
        }
        
        $this->cssFiles[] = array(
            "href" => $href,
            "type" => $type,
            "media" => $media
        );
        
        return true;
    }
    
    public function addJsFile($src)
    {
        if(empty($src))
        {
            throw new \InvalidArgumentException("JS file is incorrect.", 1);
        }

        $this->jsFiles[] = $src;
    }
    
    public function addJsPostloadFile($src)
    {
        if(empty($src))
        {
            throw new \InvalidArgumentException("JS file is incorrect.", 1);
        }
        
        $this->jsPostloadsFiles[] = $src;
    }
}

?>