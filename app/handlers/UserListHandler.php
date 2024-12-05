<?php

namespace handlers;

use common\Command;
use models\user\UserModel;

class UserListHandler implements Command
{
    private UserModel $model;

    public function __construct()
    {
        $this->model = new UserModel();
    }

    public function execute(array $data = []): string
    {
        $users = $this->model->findAllUser();
        ob_start();
        include 'find-all-user.tpl';
        return ob_get_clean();
    }
}
