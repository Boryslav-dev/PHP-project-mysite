<?php

namespace App\Model;

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

    public function getAllCategory(): array
    {
        return parent::findAll();
    }

    public function getOneCategory($id)
    {
        return parent::findOne($id);
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
