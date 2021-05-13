<?php

namespace App\Auth;

class Auth
{
    public function isAuth() {
        if (isset($_POST['submit'])) {
            if (isset($_POST['login']) && isset($_POST['password'])) {
                $login = $_POST['login'];
                $pass = $_POST['password'];

                return $this->auth($login, $pass);
            }
        }
    }

    public function auth($login, $pass) {
        $LOGIN = 'User';
        $PASSWORD = '1234567890';

        if( $login == $LOGIN && $pass == $PASSWORD) {
            session_start();
            $_SESSION['login'] = $login;
            return header('Location:/');
        }
        else return $message = "Не правильный логин или пароль";
    }

    public function getLogin() {
        return $_SESSION['login']();
    }

    public function logOut() {
        session_start();
        session_destroy();
    }

}