<?php

namespace App\Controller;

use App\Auth\Auth;
use Framework\Core\Controller;

class LoginController extends Controller
{
    protected Auth $auth;

    public function __construct()
    {
        parent::__construct();
        $this->auth = new Auth();
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
        if ($this->auth->authorization() == true) {
            return header('Location:/');
        } else {
            $this->register();
        }
    }

    public function auth()
    {
        if ($this->auth->login() == true) {
            return header('Location:/');
        } else {
            $this->login();
        }
    }

    public function logout()
    {
        $this->auth->logOut();
        return header('Location:/');
    }
}
