<?php
/*
 * Errors actions manager
 */
namespace inc\controllers;

class ErrorController extends Controller
{
    /**
     *
     * @var \Exception
     */
    private $exception = null;

    public function actIndex()
    {
        $errorView = new \inc\views\errorView();

        if($this->exception instanceof \Exception)
        {
            $errorView->setMessage($this->exception->getMessage());
        }
        
        $errorView->display();
    }

    public function setException(\Exception $exception)
    {
        $this->exception = $exception;
    }
}

?>