<?php

namespace models\user;


use common\Database;

require_once __DIR__ . '/userIterator.php';
require_once __DIR__ . '/userDto.php';

class UserModel
{
    private Database $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function getUserList(): UserListIterator
    {
        $sql = file_get_contents(__DIR__ . '/sql/find-all-user.sql');
        $result = $this->db->query($sql);
        $users = array_map(function ($user) {
            return new UserModelNew($user);
        }, $result);
        return new UserListIterator($users);
    }

    public function getUserById($userId): UserModelNew
    {
        $sql = file_get_contents(__DIR__ . '/sql/find-one-user.sql');
        $userList = $this->db->query($sql, [':userId' => $userId]);
        return new UserModelNew($userList[0]);
    }
}
