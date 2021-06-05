<?php

namespace App\Controller;

use App\Model\Product;
use Framework\Core\Controller;
use Framework\Core\Model;
use Framework\Core\View;

class ProductController extends Controller
{
    protected $product;

    public function __construct()
    {
        $this->view = new View();
        $this->model = new Model();
    }

    public function index()
    {
        return $this->view->render('product_list.php', null, 'site.php');
    }

    public function getProductList()
    {
        $this->product = new Product();

        $params = $this->product->getAllProduct();
        return $this->view->render('product_list.php', $params, 'site.php');
    }

    public function getProductListAPI()
    {
        $this->product = new Product();

        $params = $this->product->getAllProduct();
        return json_encode($params);
    }

    public function getProductById($id)
    {
        $this->product = new Product();

        $params = $this->product->getOneProduct($id);
        return$this->view->render('product_one.php', $params, 'site.php');
    }
}
