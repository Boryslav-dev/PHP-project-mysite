<?php

namespace App\Controller;

use App\Model\Category;
use Framework\Core\Controller;
use Framework\Core\Model;
use Framework\Core\View;

class CategoryController extends Controller
{
    protected Category $category;

    protected View $view;

    protected Model $model;

    public function __construct()
    {
        $this->category = new Category();
        $this->model = new Model();
    }

    public function getCategoryAPI()
    {
        $params = $this->category->getAllCategory();
        return json_encode($params);
    }
}