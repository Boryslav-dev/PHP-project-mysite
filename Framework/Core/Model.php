<?php

namespace Framework\Core;

class Model extends ActiveRecord
{
    // protected $db = null;
    protected $file;

    public function __construct() {
       // $this->db = DB::connToDB();
        $this->file = json_decode(file_get_contents('App/Storage/products.txt'), true);
    }
}