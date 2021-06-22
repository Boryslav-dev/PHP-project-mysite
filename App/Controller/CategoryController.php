<?php

namespace App\Controller;

use App\Model\Category;
use Framework\Core\Controller;

class CategoryController extends Controller
{
    protected Category $category;

    public function __construct()
    {
        parent::__construct();
        $this->category = new Category();
    }

    public function getCategoryAPI()
    {
        $params = $this->category->getAllCategory();
        return json_encode($params);
    }
}