<?php

namespace Tests\Unit;

use App\Models\Good\Cart;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    public function testFunction()
    {
        dd(Cart::computedAllGoodPrice(165));
    }
}
