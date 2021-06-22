<?php

namespace App\Model;

use Framework\Application;
use Framework\Core\Model;
use PDO;

class Role extends Model
{
    protected $id;

    public string $name;

    public string $created_at;

    public string $updated_at;

    public function attributes(): array
    {
        return ['name', 'created_at'];
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    public function checkRole($id): string
    {
        $statement = Application::$app->db->prepare("SELECT name FROM Role 
        INNER JOIN Role_to_User RtU on Role.id = RtU.role_id
        INNER JOIN User U on RtU.user_id = U.id WHERE U.id = :id");
        $statement->bindParam(':id', $id);

        $statement->execute();
        $res = $statement->fetchObject(static::class);
        return $res->getName();
    }

    public function save()
    {
        parent::save();
    }

    protected static function getTableName(): string
    {
        return 'Role_to_User';
    }
}
