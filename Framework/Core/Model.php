<?php

namespace Framework\Core;

class Model extends ActiveRecord
{
    protected $file;

    public function __construct() {
        $this->file = json_decode(file_get_contents('App/Storage/products.txt'), true);
    }

    protected static function getTableName(): string
    {
        // TODO: Implement getTableName() method.
    }

}