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

    public ?string $img;

    public string $count;

    public ?int $category_id;

    public ?string $created_at;

    public ?string $updated_at;

    public function attributes(): array
    {
        return ['name', 'price', 'img', 'count', 'category_id', 'created_at', 'updated_at'];
    }

    public function getId(): int
    {
        return parent::getId();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getImg(): string
    {
        return $this->img;
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

    public function getCreatedTime(): ?string
    {
        return $this->created_at;
    }

    public function getAllProduct(): array
    {
        return parent::findAll();
    }

    public function getAllProductByPage(int $page, string $typeSort, int $category): array
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

    public function getPages(): int
    {
        $tableName = self::getTableName();
        $statement = Application::$app->db->query("SELECT count(id) FROM $tableName");
        $res = $statement->fetchAll(PDO::FETCH_COLUMN);
        return ($res[0] / 9) + 1;
    }


    public function getOneProduct(int $id)
    {
        return parent::findById($id);
    }

    public function save()
    {
        parent::save();
    }

    public function deleteProduct(int $id)
    {
        parent::delete($id);
    }

    protected static function getTableName(): string
    {
        return 'Product';
    }
}
