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
    /**
     * CSS files
     * In every single view we can add specific css files
     * This files will be included in header
     * @var array
     */
    protected $cssFiles = array();
    /**
     * JS files
     * In every singel view we can add specific js files
     * This files will be included in header
     * @var array
     */
    protected $jsFiles = array();
    /**
     * JS files
     * In every singel view we can add specific js files
     * This file will be included at the end of body
     * @var array
     */
    protected $jsPostloadsFiles = array();
    /**
     * Subview added to this view
     * @var array
     */
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

    /**
     * Add css and js file to view and render it
     */
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

    /**
     * Render and display view
     */
    public function display()
    {
        $this->render();
        $this->smarty->display($this->template);
    }

    /**
     * Render view and return it as HTML code
     * @return string
     */
    public function fetch()
    {
        $this->render();
        return $this->smarty->fetch($this->template);
    }

    /**************************************************************************/
    /**************************************************************************/
    /**************************************************************************/
    
    /**
     * Set template file name for view
     * @param string $template template file name
     */
    public function setTemplate($template)
    {
        $this->template = $template;
    }
    
    /**
     * Add new subview to this view
     * Added subview will be rendered and set to the variable $name in this view
     * @param string $name variable name in this view to which be set rendered subview
     * @param \views\View $view
     */
    public function addView($name, \views\View $view)
    {
        $this->views[$name] = $view;
    }

    /**
     * Add new CSS file to view
     * @param string $href url for css file
     * @param string $type type attribute
     * @param string $media media attribute
     * @return boolean
     * @throws \InvalidArgumentException
     */
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
    
    /**
     * Add new JS file to view, file will be include in header
     * @param string $src url for JS file
     * @throws \InvalidArgumentException
     */
    public function addJsFile($src)
    {
        if(empty($src))
        {
            throw new \InvalidArgumentException("JS file is incorrect.", 1);
        }

        $this->jsFiles[] = $src;
    }
    
    /**
     * Add new JS file to view, file will be include at the end of body
     * @param string $src url for JS file
     * @throws \InvalidArgumentException
     */
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