<?php

namespace App\Model;

use Framework\Core\Model;

class User extends Model
{
    protected $id;

    protected string $firstname;

    protected string $lastname;

    protected string $email;

    protected $password;

    public function attributes(): array
    {
        return ['firstname', 'lastname', 'email', 'password'];
    }

    public function getFirstName(): string
    {
        return $this->firstname;
    }

    public function getLastName(): string
    {
        return $this->lastname;
    }

    public function getEmail(): string
    {
        return $this->email;
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
