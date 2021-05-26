<?php

namespace App\Controller;

use App\Auth\Auth;
use App\Model\User;
use Framework\Application;
use Framework\Core\Controller;
use Framework\Request\Request;

class LoginController extends Controller
{
    protected Auth $auth;

    public function register()
    {
        return $this->view->render('Authorization/registration.php', null, 'site.php');
    }

    public function login()
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
