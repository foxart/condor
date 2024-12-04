<?php

namespace controllers;

use models\user\UserModel;

class UserController
{
    private UserModel $model;

    public function __construct()
    {
        $this->model = new UserModel();
    }

    public function findAllUser(): string
    {
        $users = $this->model->findAllUser();
        ob_start();
        include 'find-all-user.tpl';
        return ob_get_clean();
    }
}
