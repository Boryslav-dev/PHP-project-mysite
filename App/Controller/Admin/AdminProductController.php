<?php

namespace App\Controller\Admin;

use App\Model\Category;
use App\Model\Product;
use App\Model\Role;
use App\Model\User;
use App\Service\Validation;
use DateTime;
use Framework\Core\Controller;
use Framework\Session\Session;

class AdminProductController extends Controller
{
    protected Product $product;

    protected Category $category;

    protected Role $role;

    protected User $user;

    protected Session $session;

    protected Validation $validation;

    public function __construct()
    {
        parent::__construct();
        $this->role = new Role();
        $this->product = new Product();
        $this->category = new Category();
        $this->user = new User();
        $this->session = new Session();
        $this->session->start();
        $this->validation = new Validation();
    }

    protected function checkRole(int $id): string
    {
        return $this->role->checkRole($id);
    }

    public function getProductAdmin()
    {
        if ($this->checkRole(($this->session->get('id'))) == 'Admin') {
            $params = $this->product->getAllProduct();
            return $this->view->render('Admin/productAdmin.php', $params, 'adminSite.php');
        } else {
            $this->session->set('message', 'You don`t have rights');
        }
    }

    public function deleteProduct(int $id)
    {
        if ($this->checkRole(($this->session->get('id'))) == 'Admin') {
            $this->product->deleteProduct($id);
            $this->session->set('message', 'Product success deleted!');

            return header('Location:/getProductAdmin/');
        } else {
            $this->session->set('message', 'You don`t have rights');
        }
    }

    public function createProductPage()
    {
        $params = $this->category->getAllCategory();
        return $this->view->render('Admin/changeProductAdmin.php', $params, 'adminSite.php');
    }

    public function updateProductPage(int $id)
    {
        $currentProduct = $this->product->getOneProduct($id);

        $this->session->set('idProduct', $currentProduct->getId());
        $this->session->set('nameProduct', $currentProduct->getName());
        $this->session->set('priceProduct', $currentProduct->getPrice());
        $this->session->set('countProduct', $currentProduct->getCount());
        $this->session->set('createdProduct', $currentProduct->getCreatedTime());

        $params = $this->category->getAllCategory();
        return $this->view->render('Admin/updateProductAdmin.php', $params, 'adminSite.php');
    }

    public function createProduct()
    {
        if ($this->checkRole(($this->session->get('id'))) == 'Admin') {
            if (isset($_POST['submit'])) {
                if (
                    isset($_POST['name'])
                    && isset($_POST['price'])
                    && isset($_POST['category'])
                ) {
                    $name = $_POST['name'];
                    $price = $_POST['price'];
                    $count = $_POST['count'];
                    $category = $_POST['category'];

                    if ($this->validation->validate($name, $price, $count) == false) {
                        return $this->createProductPage();
                    }

                    $this->product->name = $name;
                    $this->product->price = $price;
                    $this->product->img = '...';
                    $this->product->count = $count;
                    $this->product->category_id = $category;
                    $this->product->created_at = date("Y-m-d H:i:s");
                    $this->product->updated_at = null;

                    $this->product->save();

                    $this->session->set('message', 'Product success created!');

                    return header('Location:/getProductAdmin/');
                }
                $this->session->set('message', 'Some fields not required!');

                header('Location:/');
                return $this->createProductPage();
            } else {
                $this->session->set('message', 'You don`t have rights');
            }
        }
    }

    public function updateProduct()
    {
        if ($this->checkRole(($this->session->get('id'))) == 'Admin') {
            if (isset($_POST['submit'])) {
                if (
                    isset($_POST['name'])
                    && isset($_POST['price'])
                    && isset($_POST['category'])
                ) {
                    $id = $_POST['id'];
                    $name = $_POST['name'];
                    $price = $_POST['price'];
                    $count = $_POST['count'];
                    $category = $_POST['category'];
                    $created_at = $this->session->get('createdProduct');

                    if ($this->validation->validate($name, $price, $count) == false) {
                        return false;
                    }

                    $this->product->id = $id;
                    $this->product->name = $name;
                    $this->product->price = $price;
                    $this->product->img = '...';
                    $this->product->count = $count;
                    $this->product->category_id = $category;
                    $this->product->created_at = $created_at;
                    $this->product->updated_at = date("Y-m-d H:i:s");

                    $this->product->save();

                    $this->session->set('message', 'Product success updated!');

                    return header('Location:/getProductAdmin/');
                }
                $this->session->set('message', 'Some fields not required!');

                return $this->createProductPage();
            } else {
                $this->session->set('message', 'You don`t have rights');
            }
        }
    }
}
