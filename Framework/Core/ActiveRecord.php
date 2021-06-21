<?php

namespace Framework\Core;

use Framework\Application;
use PDO;

abstract class ActiveRecord
{
    /** @var int */
    protected int $id;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    public function __set(string $name, $value)
    {
        $camelCaseName = $this->underscoreToCamelCase($name);
        $this->$camelCaseName = $value;
    }

    private function underscoreToCamelCase(string $source): string
    {
        return lcfirst(str_replace('_', '', ucwords($source, '_')));
    }

    public static function prepare($sql)
    {
        return Application::$app->db->prepare($sql);
    }

    public function save()
    {
        $tableName = static::getTableName();
        $attributes = $this->attributes();
        $params = array_map(fn ($attr) => "?", $attributes);
        if ($this->recordExists($tableName) == true) {
            $this->update($tableName, $attributes, $params);
        } else {
            $this->insert($tableName, $attributes, $params);
        }
    }

    public function recordExists(string $tableName): bool
    {
        $statement = self::prepare("SELECT COUNT(1) FROM $tableName WHERE id = :id");
        $statement->bindParam(':id', $this->id);
        $statement->execute();
        $res = $statement->fetchAll(PDO::FETCH_COLUMN);
        if ($res[0] == 1) {
            return true;
        }
        return false;
    }

    public function insert(string $tableName, array $attributes, array $params): bool
    {
        $statement = self::prepare("INSERT INTO $tableName (" . implode(",", $attributes) . ")
                VALUES (" . implode(",", $params) . ")");
        $array = [];
        foreach ($attributes as $attribute) {
            array_push($array, $this->{$attribute});
        }
        $statement->execute($array);
        return true;
    }

    public function update(string $tableName, array $attributes, array $params): bool
    {
        $sql = "UPDATE $tableName SET ";
        for ($i = 0; $i < count($attributes); $i++) {
            if ($i == count($attributes) - 1) {
                $sql .= $attributes[$i] . "=" . $params[$i];
            } else {
                $sql .= $attributes[$i] . "=" . $params[$i] . ", ";
            }
        }
        $sql .= " WHERE id = $this->id";
        $statement = self::prepare($sql);
        $array = [];
        foreach ($attributes as $attribute) {
            array_push($array, $this->{$attribute});
        }
        $statement->execute($array);
        return true;
    }

    public static function findOne(array $where)
    {
        $tableName = static::getTableName();
        $attributes = array_keys($where);
        $sql = implode("AND", array_map(fn ($attr) => "$attr = :$attr", $attributes));
        $statement = self::prepare("SELECT * FROM $tableName WHERE $sql");
        foreach ($where as $key => $item) {
            $statement->bindValue(":$key", $item);
        }
        $statement->execute();

        return $statement->fetchObject(static::class);
    }

    public static function findById(int $id)
    {
        $tableName = static::getTableName();
        $statement = Application::$app->db->query("SELECT * FROM $tableName WHERE id = $id");
        return $statement->fetchObject(static::class);
    }

    public static function findAll()
    {
        $tableName = static::getTableName();
        $statement = Application::$app->db->query("SELECT * FROM $tableName");
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function delete($where)
    {
        $tableName = static::getTableName();
        Application::$app->db->query("DELETE FROM $tableName WHERE id = $where");
    }
}
