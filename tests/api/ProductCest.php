<?php

use Codeception\Util\HttpCode;

class ProductCest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    /**
     * @dataProvider productDataProviderSortCategory
     */
    public function testSortCategoryAPI(ApiTester $I, \Codeception\Example $example)
    {
        $I->sendGet($example['uri']);
        $I->seeResponseContainsJson([
            'category_id' => $example['expected']
        ]);
    }

    protected function productDataProviderSortCategory(): array
    {
        return [
            ['uri' => '/getProductListAPI/0/ASC/1/', 'expected' => 1],
            ['uri' => '/getProductListAPI/0/ASC/2/', 'expected' => 2],
            ['uri' => '/getProductListAPI/0/ASC/3/', 'expected' => 3],
            ['uri' => '/getProductListAPI/0/ASC/4/', 'expected' => 4],
          ];
    }

    /**
     * @dataProvider productDataProviderSort
     */
    public function testSortAPI(ApiTester $I, \Codeception\Example $example)
    {
        $I->sendGet($example['uri']);
        $I->seeResponseContainsJson([
            'price' => $example['expected']
        ]);
    }

    protected function productDataProviderSort(): array
    {
        return [
            ['uri' => '/getProductListAPI/0/ASC/0/', 'expected' => 3500],
            ['uri' => '/getProductListAPI/0/DESC/0/', 'expected' => 86000],
        ];
    }

    /**
     * @dataProvider productDataProviderPagination
     */
    public function testPaginationAPI(ApiTester $I, \Codeception\Example $example)
    {
        $I->sendGet($example['uri']);
        $I->seeResponseContainsJson([
            'id' => $example['expected']
        ]);
    }

    protected function productDataProviderPagination(): array
    {
        return [
            ['uri' => '/getProductListAPI/0/ASC/0/', 'expected' => 4],
            ['uri' => '/getProductListAPI/1/ASC/0/', 'expected' => 10],
        ];
    }
}
