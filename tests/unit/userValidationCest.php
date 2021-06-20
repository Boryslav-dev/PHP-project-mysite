<?php

use App\Auth\Auth;
use Framework\Session\Session;

class userValidationCest
{
    private $auth;

    public function _before(UnitTester $I)
    {
        $this->auth = new Auth();
    }

    /**
     * @dataProvider emailDataProviderMessage
     */
    public function tryToTestGetMessageValidate(UnitTester $I, \Codeception\Example $example)
    {
        $this->auth->validate($example['login'], $example['email'], $example['password']);
        $actualMessage = $this->auth->message;
        $expectedMessage = $example['expected'];

        $I->assertEquals($expectedMessage, $actualMessage);
    }

    protected function emailDataProviderMessage(): array
    {
        return [
            ['login' => 'Login', 'email' => 'email@gmail.com', 'password' => 'Password1234', 'expected' => null],
            ['login' => 'fin', 'email' => 'email&gmail.com', 'password' => 'sfdg', 'expected' => 'Email don`t have "@"'],
            ['login' => 'Ln', 'email' => 'email@gmail.com','password' => '1324', 'expected' => 'Login is so short'],
            ['login' => 'Login2443', 'email' => 'l:d@gmail.com','password' => 'passwDS', 'expected' => 'Password must have: Uppercase and lowercase later, number, and minimum 8 symbols'],
            ['login' => 'login', 'email' => 'email@gmail.com','password' => 'pass1234', 'expected' => 'Password must have: Uppercase and lowercase later, number, and minimum 8 symbols'],
            ['login' => 'Login12344', 'email' => 'l.com','password' => '___', 'expected' => 'Email don`t have "@"'],
        ];
    }
    /**
     * @dataProvider emailDataProvider
     */
    public function tryToTestUserEmailValidation(UnitTester $I, \Codeception\Example $example)
    {
        $actualResult = $this->auth->validate($example['login'], $example['email'], $example['password']);
        $expectedResult = $example['expected'];

        $I->assertEquals($expectedResult, $actualResult);
    }

    protected function emailDataProvider(): array
    {
        return [
            ['login' => 'Login', 'email' => 'Login@gmail.com', 'password' => 'Password1234', 'expected' => true],
            ['login' => 'fin', 'email' => 'email&gmail.com', 'password' => 'sfdg', 'expected' => false],
            ['login' => 'Ln', 'email' => 'email@gmail.com','password' => '1324', 'expected' => false],
            ['login' => 'Login2443', 'email' => 'l:d@gmail.com','password' => 'passwDS', 'expected' => false],
            ['login' => '', 'email' => 'email@gmail.com','password' => 'pass1234', 'expected' => false],
            ['login' => 'Login12344', 'email' => 'l.com','password' => '___', 'expected' => false],
        ];
    }
}
