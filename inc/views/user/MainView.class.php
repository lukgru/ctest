<?php

namespace inc\views\user;

class MainView extends \inc\views\View
{

    private $user = null;

    public function __construct(\inc\User $user)
    {
        parent::__construct();

        $this->user = $user;
    }

    public function render()
    {
        $this->smarty->assign("user", $this->user);
        $this->smarty->assign("friends", \inc\Users::getUserFriends($this->user));
        $this->smarty->assign("friends2nd", \inc\Users::getUserFriendsFriends($this->user));
        $this->smarty->assign("friends2nd2", \inc\Users::getUserFriendsFriendsWith2Connections($this->user));
        $this->smarty->assign("body_content", $this->smarty->fetch("user/userMain.tpl"));

        parent::render();
    }
}

?>