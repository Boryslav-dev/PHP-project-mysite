<?php

namespace App\Model;

use Framework\Core\Model;

class Product extends Model
{
    protected $id;

    protected string $name;

    protected string $category;

    public function getName(): string
    {
        return $this->name;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function getAllProduct(): array
    {
        return $this->file;
    }

    public function getOneProduct($id): array
    {
        $products = $this->file;

        if ($id !== $products[$id]['id']) {
            echo($id);
        } else {
            $data = ($products[$id]);
        }
        return $data;
    }

    protected static function getTableName(): string
    {
        return "Product";
    }
}
