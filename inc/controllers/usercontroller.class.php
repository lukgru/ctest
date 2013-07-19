<?php
/**
 * User actions manager
 */
namespace inc\controllers;

class UserController extends Controller
{

    public function actIndex()
    {
        try
        {
            $userId = \inc\registry\requestRegistry::getInstance()->get("id");

            if(!$userId)
            {
                throw new \RuntimeException("Empty user id.", 1);
            }

            $user = \inc\Users::getUser($userId);

            if(!$user)
            {
                throw new \RuntimeException("User doesn't exist.", 1);
            }

            $userMainView = new \inc\views\user\mainView($user);
            $userMainView->display();
        }
        catch(\Exception $ex)
        {
            $errorView = new \inc\views\errorView();
            $errorView->setMessage($ex->getMessage());
            $errorView->display();
        }
    }

    public function setErrorNo($error_no)
    {
        $this->error_no = (int) $error_no;
    }

}

?>