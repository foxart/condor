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
        $userList = $this->userModel->findAll();
        ob_start();
        include 'FindAllUserHandler.tpl';
        return ob_get_clean();
    }
}
