<?php

class addUserCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTestSingInUser(AcceptanceTester $I)
    {
        $I->amOnPage('/login/');

        $I->see('Please sign in');
        $I->fillField('email', 'User@gmail.com');
        $I->fillField('password', 'user1234');
        $I->click('submit');

        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->see('User');
    }

    public function tryToTestSingInWithIncorrectUser(AcceptanceTester $I)
    {
        $I->amOnPage('/login/');

        $I->see('Please sign in');
        $I->fillField('email', 'john&gmail.com');
        $I->fillField('password', 'john4325');
        $I->click('submit');

        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->dontSee('John');
        $I->see('This email not exists');
    }

    public function tryToTestSingInWithIncorrectPassword(AcceptanceTester $I)
    {
        $I->amOnPage('/login/');

        $I->see('Please sign in');
        $I->fillField('email', 'user@gmail.com');
        $I->fillField('password', 'user213');
        $I->click('submit');

        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->dontSee('User');
        $I->see('Incorrect password');
    }
}
