<?php
class Connect
{
    private $dbHost = "";
    private $dbName = "";
    private $dbUser = "";
    private $dbPass = "";



    public function conectar()
    {
        try {
            $connection = new PDO(
                "mysql:host=$this->dbHost;dbname=$this->dbName",
                "$this->dbUser",
                "$this->dbPass"
            );

            return $connection;


        } catch (PDOException $e) {
            echo '<p>' . $e->getMessage() . '</p>';
        }
    }
}