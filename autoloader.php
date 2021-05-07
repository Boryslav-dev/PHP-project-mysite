<?php

class Autoloader
{

    public function __construct(array $rules = [])
    {

    }

    public function load($classname){

        $part = explode('\\', $classname);
        $part = array_splice($part, 1, count($part));

        $path = __DIR__ . "/App/" . implode('/', $part) . '.php';

        if (file_exists($path)){
            require_once $path;
            return true;
        }
        return false;
    }
}

?>