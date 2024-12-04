<?php

namespace controllers;

use models\user\UserModel;

class UserController
{
    private string $tableStyle = 'border-collapse: collapse; width: 100%;';
    private string $cellStyle = 'border: solid 1px black; border-collapse: collapse;';
    private UserModel $model;

    public function __construct()
    {
        $this->model = new UserModel();
    }

    public function getUserList(): string
    {
        $users = $this->model->getUserList();
        if (count($users)) {
            ob_start();
            echo "<table style='$this->tableStyle'>";
            foreach ($users as $user) {
                echo '<tr>';
                echo "<td style='$this->cellStyle'>" . $user->getId() . '</td>';
//                echo "<td style='$this->cellStyle'>" . $user->getEmail() . '</td>';
                echo "<td style='$this->cellStyle'><a href='/transaction/{$user->getId()}'>{$user->getUsername()}</a></td>";
//                echo "<td style='$this->cellStyle'>" . $user->getPassword() . '</td>';
//                echo "<td style='$this->cellStyle'>" . $user->getFirstname() . '</td>';
//                echo "<td style='$this->cellStyle'>" . $user->getLastname() . '</td>';
//                echo "<td style='$this->cellStyle'>" . $user->getDob() . '</td>';
                echo "<td style='$this->cellStyle'>" . $user->getCity() . '</td>';
//                echo "<td style='$this->cellStyle'>" . $user->getZipcode() . '</td>';
//                echo "<td style='$this->cellStyle'>" . $user->getAddress() . '</td>';
//                echo "<td style='$this->cellStyle'>" . $user->getCreatedAt() . '</td>';
                echo "<td style='$this->cellStyle'>" . $user->getStatusName() . '</td>';
                echo "<td style='$this->cellStyle'>" . $user->getCountryName() . '</td>';
                echo '</tr>';
            }
            echo '</table>';
            return ob_get_clean();
        }
        return '';
    }
}
