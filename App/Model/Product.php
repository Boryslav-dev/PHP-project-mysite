<?php

namespace App\Model;

use Framework\Application;
use Framework\Core\Model;
use PDO;

class Product extends Model
{
    public $id;

    public string $name;

    public string $price;

    public string $count;

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

    public function getPrice(): string
    {
        return $this->price;
    }

    public function getCount(): string
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

    public function getAllProductByPage($page, $typeSort, $category): array
    {
        $start = $page * 9;
        $finish = ($page + 1) * 9;
        $tableName = self::getTableName();
        if ($category != 0) {
            $where = "WHERE category_id = $category";
        } else {
            $where = "";
        }
        $statement = Application::$app->db->query("SELECT * FROM $tableName
                                                    $where
                                                    ORDER BY price $typeSort
                                                    LIMIT $start,$finish");
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOneProduct($id)
    {
        return parent::findById($id);
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
