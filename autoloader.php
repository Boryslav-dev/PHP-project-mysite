<?php

namespace Framework\Core\Autoloader;

class Autoloader
{
    public function __construct(array $rules = [])
    {

    }

    public function load($classname){

        $part = explode('\\', $classname);

        $path = __DIR__ . '/../Framework/' . implode('/', $part) . '.php';

        print_r($path);

        if (file_exists($path)){
            require_once $path;
            return true;
        }
        return false;
    }
}

?>