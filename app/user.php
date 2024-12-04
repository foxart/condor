<?php
require_once 'models/userModel.php';

class User
{
    private string $tableStyle = 'border-collapse: collapse; width: 100%;';
    private string $cellStyle = 'border: solid 1px black; border-collapse: collapse;';
    private UserModel $model;

    public function __construct()
    {
        $this->model = new UserModel();
    }

    public function getUserList(): void
    {
        $content = '';
        $users = $this->model->getUserList();
        if (count($users)) {
            ob_start();
            echo "<table style='$this->tableStyle'>";
            foreach ($users as $item) {
                echo '<tr>';
                echo "<td style='$this->cellStyle'>" . $item->getId() . '</td>';
//                echo "<td style='$this->cellStyle'>" . $item->getEmail() . '</td>';
                echo "<td style='$this->cellStyle'><a href='/transaction/{$item->getId()}'>{$item->getUsername()}</a></td>";
//                echo "<td style='$this->cellStyle'>" . $item->getPassword() . '</td>';
//                echo "<td style='$this->cellStyle'>" . $item->getFirstname() . '</td>';
//                echo "<td style='$this->cellStyle'>" . $item->getLastname() . '</td>';
//                echo "<td style='$this->cellStyle'>" . $item->getDob() . '</td>';
                echo "<td style='$this->cellStyle'>" . $item->getCity() . '</td>';
//                echo "<td style='$this->cellStyle'>" . $item->getZipcode() . '</td>';
//                echo "<td style='$this->cellStyle'>" . $item->getAddress() . '</td>';
//                echo "<td style='$this->cellStyle'>" . $item->getCreatedAt() . '</td>';
                echo "<td style='$this->cellStyle'>" . $item->getStatus() . '</td>';
                echo "<td style='$this->cellStyle'>" . $item->getCountry() . '</td>';
                echo '</tr>';
            }
            echo '</table>';
            $content = ob_get_clean();
        }
        echo $content;
    }
}
