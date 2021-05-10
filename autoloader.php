<?php

class Autoloader
{
    public function __construct(array $rules = [])
    {

    }

    public function load($classname){
        $part = explode('\\', $classname);
        $path = __DIR__ . '/' . implode('/', $part) . '.php';
        if (file_exists($path)){
            require_once $path;
            return true;
        }
        return false;
    }
}

?>