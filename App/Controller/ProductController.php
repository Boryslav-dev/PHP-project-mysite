<?php

namespace App\Controller;

use App\Model\Product;
use Framework\Core\Controller;
use Framework\Core\Model;
use Framework\Core\View;

class ProductController extends Controller
{
    protected Product $product;

    protected View $view;

    protected Model $model;

    public function __construct()
    {
        $this->product = new Product();
        $this->view = new View();
        $this->model = new Model();
    }

    public function index()
    {
        return $this->view->render('product_list.php', null, 'site.php');
    }

    public function product()
    {
        return $this->view->render('product_one.php', null, 'site.php');
    }

    public function getProductList()
    {
        $params = $this->product->getAllProduct();
        return $this->view->render('product_list.php', $params, 'site.php');
    }

    public function getProductById($id)
    {
        $params = $this->product->getOneProduct($id);
        return$this->view->render('product_one.php', $params, 'site.php');
    }

    /* API */

    public function getProductListAPI($page, $typeSort)
    {
        $params = $this->product->getAllProductByPage($page, $typeSort);
        return json_encode($params);
    }

    public function getProductByIdAPI($id)
    {
        $params = $this->product->getOneProduct($id);
        return json_encode($params);
    }
}
