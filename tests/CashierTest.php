<?php

namespace Kata\FruitShop;

use PHPUnit\Framework\TestCase;

class CashierTest extends TestCase
{
    /**
     * @test
     */
    public function instantiate_cashier()
    {
        $cashier = new Cashier();
    }

    /**
     * @test
     */
    public function it_throws_an_exception_when_an_invalid_fruit_is_provided()
    {
        $cashier = new Cashier();

        $this->expectException(InvalidFruit::class);

        $cashier->cash('invalid fruit');
    }
}
