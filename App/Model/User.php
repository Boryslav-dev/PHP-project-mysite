<?php

namespace App\Model;

use Framework\Application;
use Framework\Core\Model;
use PDO;

class User extends Model
{
    protected $id;

    public string $login;

    public string $email;

    public string $password;

    public $created_at;

    public $updated_at;

    public function attributes(): array
    {
        return ['login', 'email', 'password', 'created_at'];
    }

    public function getId(): int
    {
        return $this->id;
    }
    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getUser(string $email)
    {
        return parent::findOne(array('email' => $email));
    }

    public function checkUser(string $email): bool
    {
        $tableName = self::getTableName();
        $statement = Application::$app->db->prepare("SELECT COUNT(1) FROM $tableName WHERE email = :email");
        $statement->bindParam(':email', $email);
        $statement->execute();
        $res = $statement->fetchAll(PDO::FETCH_COLUMN);
        if ($res[0] == 1) {
            return true;
        }
        return false;
    }

    public function save()
    {
        parent::save();
    }

    protected static function getTableName(): string
    {
        return 'User';
    }

}
