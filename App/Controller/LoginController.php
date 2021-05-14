<?php

namespace App\Controller;

use App\Auth\Auth;
use Framework\Core\Controller;

class LoginController extends Controller
{
    protected Auth $auth;

    public function authorization()
    {
        return $this->view->render('Authorization/login.php', null, 'site.php');
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
