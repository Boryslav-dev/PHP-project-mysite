<?php

namespace App\Controller;

use App\Auth\Auth;
use Framework\Core\Controller;

class LoginController extends Controller
{

    protected Auth $auth;

    public function login() {
        $auth = new Auth();
        $message = $auth->isAuth();
        return $this->view->render('Authorization/login.php', $message, 'site.php');
    }

    public function logout(){
        $auth = new Auth();
        $auth->logOut();
        return header('Location:/');
    }

}