<?php

namespace App\Auth;

use App\Model\User;
use Framework\Request\Request;
use Framework\Session\Session;

class Auth
{
    protected Session $session;

    protected User $user;

    public string $message;

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
                }

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

    protected function setOldValue($value)
    {
        foreach ($value as $items => $item) {
            $this->session->set("$items", "$item");
        }
    }

    public function validate(string $login, string $email, string $password): bool
    {
        $pattern_login = '/\w{3,}/';
        $pattern_email = '/\w+@\w+\.\w+/';
        $pattern_password = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/';

        if (preg_match($pattern_login, $login) == false) {
            $this->message = 'Login is so short';
            $this->session->set('message', $this->message);
            return false;
        }
        if (preg_match($pattern_email, $email) == false) {
            $this->message = 'Email don`t have "@"';
            $this->session->set('message', $this->message);
            return false;
        }
        if (preg_match($pattern_password, $password) == false) {
            $this->message = 'Password must have: Uppercase and lowercase later, number, and minimum 8 symbols';
            $this->session->set('message', $this->message);
            return false;
        }
        return true;
    }

    public function login(): bool
    {
        if (isset($_POST['submit'])) {
            if (isset($_POST['email']) && isset($_POST['password'])) {
                $email = $_POST['email'];
                $pass = $_POST['password'];

                $value['email'] = $email;

                $this->setOldValue($value);

                if ($this->user->checkUser($email) == true) {
                    $currentUser = $this->user->getUser($email);
                    if ($currentUser->password != $pass) {
                        $this->session->set('message', 'Incorrect password');
                        return false;
                    }
                    $this->session->setName($currentUser->login);
                    $this->session->delete('message');
                    return true;
                } else {
                    $this->session->set('message', 'This email not exists');
                    return false;
                }
            }
        }
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
