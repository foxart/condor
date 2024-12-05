<?php

namespace handlers;

use common\Command;
use models\user\UserModel;

class FindAllUserHandler implements Command
{
    private UserModel $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function execute($url, $data = []): string
    {
        debug($url);
        $userList = $this->userModel->findAllUser();
        ob_start();
        include 'find-all-user.tpl';
        return ob_get_clean();
    }
}
