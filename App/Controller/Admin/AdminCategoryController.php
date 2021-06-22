<?php

namespace App\Controller\Admin;

use App\Model\Category;
use App\Model\Role;
use Framework\Core\Controller;
use Framework\Session\Session;

class AdminCategoryController extends Controller
{
    protected Category $category;

    protected Role $role;

    protected Session $session;

    public function __construct()
    {
        parent::__construct();
        $this->role = new Role();
        $this->category = new Category();
        $this->session = new Session();
        $this->session->start();
    }

    protected function checkRole(int $id): string
    {
        return $this->role->checkRole($id);
    }

    public function getCategoryAdmin()
    {
        if ($this->checkRole(($this->session->get('id'))) == 'Admin') {
            $params = $this->category->getAllCategory();
            return $this->view->render('Admin/categoryAdmin.php', $params, 'adminSite.php');
        } else {
            $this->session->set('message', 'You don`t have rights');
        }
    }

    public function createCategoryPage()
    {
        return $this->view->render('Admin/changeCategoryAdmin.php', null, 'adminSite.php');
    }

    public function createCategory()
    {
        if ($this->checkRole(($this->session->get('id'))) == 'Admin') {
            if (isset($_POST['submit'])) {
                if (isset($_POST['name'])) {
                    $name = $_POST['name'];

                    $this->category->name = $name;

                    $this->category->created_at = date("Y-m-d H:i:s");

                    $this->category->save();

                    $this->session->set('message', 'Category success created!');

                    return header('Location:/getCategoryAdmin/');
                }
            } else {
                $this->session->set('message', 'You don`t have rights');
            }
        }
    }

    public function deleteCategory(int $id)
    {
        if ($this->checkRole(($this->session->get('id'))) == 'Admin') {
            $this->category->deleteCategory($id);
            $this->session->set('message', 'Product success deleted!');

            return header('Location:/getCategoryAdmin/');
        } else {
            $this->session->set('message', 'You don`t have rights');
        }
    }
}
