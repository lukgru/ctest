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
            $userId = \inc\registry\RequestRegistry::getInstance()->get("id");

            if(!$userId)
            {
                throw new \RuntimeException("Empty user id.", 1);
            }

            $user = \inc\Users::getUser($userId);

            if(!$user)
            {
                throw new \RuntimeException("User doesn't exist.", 1);
            }

            $userMainView = new \inc\views\user\MainView($user);
            $userMainView->display();
        }
        catch(\Exception $ex)
        {
            $errorView = new \inc\views\ErrorView();
            $errorView->setMessage($ex->getMessage());
            $errorView->display();
        }
    }
}

?>