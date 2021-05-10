<?php

namespace Framework\Core;

class Controller
{
    public View $view;
    public Model $model;

    public function __construct() {
        $this->view = new View();
        $this->model = new Model();
    }

}