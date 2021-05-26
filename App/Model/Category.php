<?php

namespace App\Repository;

use Framework\Core\Model;

class Category extends Model
{
    protected $id;

    protected string $name;

    public function attributes(): array
    {
        return ['name'];
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAllCategory()
    {
        parent::findAll();
    }

    public function getOneCategory($id)
    {
        parent::findOne($id);
    }

    public function save()
    {
        parent::save();
    }

    public function deleteCategory($id)
    {
        parent::delete($id);
    }

    protected static function getTableName(): string
    {
        return "Category";
    }
}
