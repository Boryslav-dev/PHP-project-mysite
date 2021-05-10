<?php

namespace App\Controller;

use App\Model\Product;
use Framework\Core\Controller;

class ProductController extends Controller
{
    protected $productController;

    public function getProductList()
    {
        $this->productController = new Product();
        $params = $this->productController->getAllProduct();
        return($this->view->render('product_list.php', $params, 'site.php'));
    }

    public function login()
    {
        $this->setLayout('auth');
        return $this->render('login');
    }
}