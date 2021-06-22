<?php

namespace App\Model;

use Framework\Core\Model;

class RoleToUser extends Model
{
    protected $id;

    public int $user_id;

    public int $role_id;

    public function attributes(): array
    {
        return ['user_id', 'role_id'];
    }
    /**
     * @return int
     */
    public function getRoleId(): int
    {
        return $this->role_id;
    }
    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
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
