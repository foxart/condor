<?php

namespace models\user;

use common\Database;

class UserModel
{
    private Database $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function findAll(): UserListIterator
    {
        $sql = file_get_contents(__DIR__ . '/sql/find-all-user.sql');
        $result = $this->db->query($sql);
        $users = array_map(function ($user) {
            return new UserDto($user);
        }, $result);
        return new UserListIterator($users);
    }

    public function findOne($userId): UserDto
    {
        $sql = file_get_contents(__DIR__ . '/sql/find-one-user.sql');
        $userList = $this->db->query($sql, [':userId' => $userId]);
        return new UserDto($userList[0]);
    }
}
