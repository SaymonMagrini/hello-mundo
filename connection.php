<?php
class Connect
{
    private $dbHost = "localhost";
    private $dbName = "your_db";
    private $dbUser = "your_user";
    private $dbPass = "your_pass";

    public function connect()
    {
        try {
            $pdo = new PDO(
                "mysql:host={$this->dbHost};dbname={$this->dbName}",
                $this->dbUser,
                $this->dbPass,
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
            return $pdo;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
