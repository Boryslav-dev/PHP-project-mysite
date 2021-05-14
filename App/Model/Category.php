<?php

namespace App\Repository;

use Framework\Core\Model;

class Category extends Model
{
    protected $id;

    protected string $name;

    public function getName(): string
    {
        return $this->name;
    }

    protected static function getTableName(): string
    {
        return "Category";
    }
}
