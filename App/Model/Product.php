<?php

namespace App\Model;

use Framework\Core\Model;

class Product extends Model
{
    public $id;

    public string $name;

    public int $price;

    public int $count;

    public int $category_id;

    public function attributes(): array
    {
        return ['name', 'price', 'count', 'category_id'];
    }

    public function getId(): int
    {
        return parent::getId();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getCount(): int
    {
        return $this->count;
    }

    public function getCategory(): string
    {
        return $this->category_id;
    }

    public function getAllProduct(): array
    {
        return parent::findAll();
    }

    public function getOneProduct($id): array
    {
        return array(parent::findById($id));
    }

    public function save()
    {
        parent::save();
    }

    public function deleteProduct($id)
    {
        parent::delete($id);
    }

    protected static function getTableName(): string
    {
        return 'Product';
    }
}
