<?php

use App\Model\Product;
use Framework\Application;

class ProductCest
{
    private Product $product;

    private Application $app;

    private int $lastInsertId;

    public function _before(UnitTester $I)
    {
        $this->product = new Product();
    }

    // tests
    public function tryToTestAddProduct(UnitTester $I)
    {
        $this->product->name = 'test';
        $this->product->price = 10000;
        $this->product->img = '...';
        $this->product->count = 1;
        $this->product->category_id = 1;
        $this->product->created_at = '2021-06-22 15:24:41';
        $this->product->updated_at = null;
        $this->lastInsertId = $this->app->db->getLastInsertId();

        $this->product->save();
        $I->seeInDatebase('Product', ['name' => 'test', 'price' => 10000, 'img' => '...', 'count' => 1,
            'created_at' => '2021-06-22 15:24:41', 'updated_at' => null]);
    }

    public function tryToTestUpdateProduct(UnitTester $I)
    {
        $this->product->id = $this->lastInsertId;
        $this->product->name = 'test';
        $this->product->price = 22000;
        $this->product->img = '...';
        $this->product->count = 1;
        $this->product->category_id = 1;
        $this->product->created_at = '2021-06-22 15:24:41';
        $this->product->updated_at = null;

        $this->product->save();
        $I->seeInDatebase('Product', ['name' => 'test', 'price' => 22000, 'img' => '...', 'count' => 1,
            'created_at' => '2021-06-22 15:24:41', 'updated_at' => null]);
    }

    public function tryToTestDeleteProduct(UnitTester $I)
    {
        $this->product->id = $this->lastInsertId;
        $this->product->deleteProduct($this->product->id);
        $I->dontseeInDatebase('Product', ['id' => $this->lastInsertId]);
    }
}
