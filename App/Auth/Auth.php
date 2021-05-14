<?php

namespace App\Auth;

use Framework\Session\Session;

class Auth
{

    protected Session $session;

    public function __construct() {
        $this->session = new Session();
    }

    public function isAuth(): bool
    {
        if (isset($_POST['submit'])) {
            if (isset($_POST['login']) && isset($_POST['password'])) {
                $login = $_POST['login'];
                $pass = $_POST['password'];

                return $this->auth($login, $pass);
            }
        }
    }

    public function auth($login, $pass): bool {

        $LOGIN = 'User';
        $PASSWORD = '1234567890';

        if( $login == $LOGIN && $pass == $PASSWORD) {
            session_start();
            $_SESSION['login'] = $login;

            return true;
        }
        else return false;
    }

    public function getLogin(): string {
        return $_SESSION['login'];
    }

    public function logOut(): void {
        $this->session->destroy();
    }

}
