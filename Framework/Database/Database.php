<?php

namespace Framework\Database;

use PDO;

class Database
{
    public PDO $pdo;

    public function __construct()
    {
        $db = 'internetshop_db';
        $host = 'localhost';
        $charset = 'utf8';
        $username = 'root';
        $password = '261200';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

        $this->pdo = new PDO($dsn, $username, $password);
    }

    public function prepare($sql)
    {
        return $this->pdo->prepare($sql);
    }

    public function query($sql)
    {
        return $this->pdo->query($sql);
    }

    public function getLastInsertId()
    {
        return $this->pdo->lastInsertId();
    }

}
