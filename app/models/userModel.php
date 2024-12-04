<?php
require_once __DIR__ . '/../system/database.php';
require_once __DIR__ . '/../dto/userDto.php';
require_once __DIR__ . '/../iterators/userListIterator.php';

class UserModel
{
    private Database $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function getUserList(): UserListIterator
    {
        $query = "
        select u.*, c.name as country, s.name as status from users as u
        left join condor.country c on c.id = u.country
        left join condor.status s on s.id = u.status
        ";
        $userList = $this->db->query($query);
        $userList = array_map(function ($user) {
            return new UserDto(...$user);
        }, $userList);
        return new UserListIterator($userList);
    }

    public function getUserById($id): UserDto
    {
        $userList = $this->db->query("SELECT * FROM users WHERE id = ?", [$id]);
        return new UserDto(...$userList[0]);
    }
}
