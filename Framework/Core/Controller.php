<?php

namespace Framework\Core;

class Controller
{
    protected View $view;

    protected Model $model;

    public function __construct()
    {
        $this->view = new View();
        $this->model = new Model();
    }
}
