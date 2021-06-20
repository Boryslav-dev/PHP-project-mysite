<?php

use Codeception\Util\HttpCode;

class CategoryCest
{
    /**
     * @var \ApiTester
     */
    protected $tester;

    protected function _before(\ApiTester $I)
    {
        $I->haveHttpHeader('accept', 'application/json');
        $I->haveHttpHeader('content-type', 'application/json');
    }

    protected function _after()
    {
    }

    // tests
    public function testCategory(\ApiTester $I)
    {
        $I->sendGet('/getCategoryAPI/');
        $I->seeResponseCodeIs(HttpCode::OK); // 200
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson([
            'id' => 1,
            'name' => "Sedan"
        ]);
    }

    public function testGetCategory(\ApiTester $I)
    {
        $I->haveInDatabase('Category', ['id' => 5, 'name' => 'Crossover']);
        $I->sendGet('/getCategoryAPI/');
        $I->seeResponseCodeIs(HttpCode::OK); // 200
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson([
            'id' => 5,
            'name' => 'Crossover',
        ]);
    }
}
