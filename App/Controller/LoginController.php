<?php

namespace App\Controller;

use App\Auth\Auth;
use App\Model\User;
use Framework\Application;
use Framework\Core\Controller;
use Framework\Core\Model;
use Framework\Core\View;
use Framework\Request\Request;

class LoginController extends Controller
{
    protected Auth $auth;

    protected View $view;

    protected Model $model;

    public function __construct()
    {
        $this->view = new View();
        $this->model = new Model();
    }

    public function register()
    {
        return $this->view->render('Authorization/registration.php', null, 'site.php');
    }

    public function login()
    {
        return $this->view->render('Authorization/login.php', null, 'site.php');
    }

    public function authorization()
    {
        $auth = new Auth();
        if ($auth->authorization() == true) {
            return header('Location:/');
        } else {
            $this->register();
        }
    }

    public function auth()
    {
        $auth = new Auth();
        $auth->isAuth();
        return header('Location:/');
    }

    public function logout()
    {
        $auth = new Auth();
        $auth->logOut();
        return header('Location:/');
    }
}
