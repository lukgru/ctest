<?php
namespace inc\views;

class errorView extends View
{
    private $message = "";
    
    public function __construct()
    {
        parent::__construct();
    }

    public function render()
    {
        if($this->message)
        {
            $this->smarty->assign("message", $this->message);
        }
        
        $this->smarty->assign("body_content", $this->smarty->fetch("errors/default.tpl"));
        
        parent::render();
    }
    
    public function setMessage($message)
    {
        $this->message = $message;
    }
}
?>