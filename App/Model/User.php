<?php

namespace App\Model;

use Framework\Core\Model;

class User extends Model
{
    protected $id;

    protected $name;

    protected $password;

    public function getName(): string
    {
        return $this->name;
    }

    protected static function getTableName(): string
    {
        return "User";
    }

}