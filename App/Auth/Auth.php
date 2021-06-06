<?php

namespace App\Auth;

use App\Model\User;
use Framework\Request\Request;
use Framework\Session\Session;

class Auth
{
    protected Session $session;

    protected User $user;

    public function __construct()
    {
        $this->session = new Session();
        $this->session->start();
        $this->user = new User();
    }

    public function authorization(): bool
    {
        $value = array();

        if (isset($_POST['submit'])) {
            if (
                isset($_POST['login'])
                && isset($_POST['email'])
                && isset($_POST['password'])
                && isset($_POST['passwordConfirm'])
            ) {
                $login = $_POST['login'];
                $email = $_POST['email'];
                $passConfirm = $_POST['passwordConfirm'];
                $pass = $_POST['password'];

                $value['login'] = $login;
                $value['email'] = $email;

                $this->setOldValue($value);

                if ($passConfirm != $pass) {
                    $this->session->set('message', 'Password input incorrect');
                    return false;
                }

                if ($this->validate($login, $email, $pass) == false) {
                    return false;
                };

                $this->user->login = $login;
                $this->user->email = $email;
                $this->user->password = $pass;

                if ($this->user->checkUser($email) == false) {
                    $this->user->save();
                    $this->session->setName($login);
                    $this->session->delete('message');
                } else {
                    $this->session->set('message', 'User was exists');
                    return false;
                }
            } else {
                $this->session->set('message', 'Some fields are empty');
                return false;
            }
        }
        return true;
    }

    public function setOldValue($value)
    {
        foreach ($value as $items => $item) {
            $this->session->set("$items", "$item");
        }
    }

    public function validate($login, $email, $password): bool
    {
        $pattern_login = '/\w{3,}/';
        $pattern_email = '/\w+@\w+\.\w+/';
        $pattern_password = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/';

        if (preg_match($pattern_login, $login) == false) {
            $this->session->set('message', 'Login is so short');
            return false;
        }
        if (preg_match($pattern_email, $email) == false) {
            $this->session->set('message', 'Email don`t have "@"');
            return false;
        }
        if (preg_match($pattern_password, $password) == false) {
            $this->session->set('message', 'Password must have: Uppercase and lowercase later, number, and minimum 8 symbols');
            return false;
        }
        return true;
    }

    public function checkPassword()
    {
    }

    public function isAuth($login, $pass): bool
    {
    }

    public function getLogin(): string
    {
        return $_SESSION['login'];
    }

    public function logOut(): void
    {
        $this->session->destroy();
    }
}
