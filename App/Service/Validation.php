<?php

namespace App\Service;

use Framework\Session\Session;

class Validation
{
    protected Session $session;

    protected string $message;

    public function __construct()
    {
        $this->session = new Session();
    }
    public function validate(string $name, string $price, string $count): bool
    {
        $pattern_name = '/\w{3,}/';
        $pattern_price = '/\d+/';
        $pattern_count = '/\d+/';

        if (preg_match($pattern_name, $name) == false) {
            $this->message = 'Login is so short';
            $this->session->set('message', $this->message);
            return false;
        }
        if (preg_match($pattern_price, $price) == false) {
            $this->message = 'Must be a number';
            $this->session->set('message', $this->message);
            return false;
        }
        if (preg_match($pattern_count, $count) == false) {
            $this->message = 'Must be a number';
            $this->session->set('message', $this->message);
            return false;
        }
        return true;
    }
}