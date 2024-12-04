<?php

namespace common;

use PDO;

class Database
{
    private static Database|null $instance = null;
    private PDO $pdo;
    private string $database = "condor";
    private string $host = "mysql";
    private string $user = "root";
    private string $password = "root";

    private function __construct()
    {
        $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->database", $this->user, $this->password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getConnection(): Database
    {
        if (!(self::$instance instanceof Database)) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function pdo(): PDO
    {
        return $this->pdo();
    }

    public function query($sql, $params = []): array
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
