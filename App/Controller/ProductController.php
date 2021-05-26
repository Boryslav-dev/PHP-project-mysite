<?php

namespace App\Controller;

use App\Model\Product;
use Framework\Core\Controller;

class ProductController extends Controller
{
    protected $product;

    public function getProductList()
    {
        $this->product = new Product();

        $params = $this->product->getAllProduct();
        return $this->view->render('product_list.php', $params, 'site.php');
    }

    public function getProductById($id)
    {
        $this->product = new Product();
        $params = $this->product->getOneProduct($id);
        return$this->view->render('product_one.php', $params, 'site.php');
    }
}
