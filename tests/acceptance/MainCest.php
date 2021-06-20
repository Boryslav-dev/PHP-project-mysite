<?php

class MainCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTestMainPage(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->see('Магазин автомобилей');
    }
}
