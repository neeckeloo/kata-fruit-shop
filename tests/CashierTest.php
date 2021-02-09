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

    /**
     * @test
     * @dataProvider cartProvider
     */
    public function it_create_cart(array $fruits, $expectedTotalAmount)
    {
        $cashier = new Cashier();

        $this->assertNotEmpty($fruits);

        foreach ($fruits as $fruit) {
            $cashier->cash($fruit);
        }

        $this->assertSame($expectedTotalAmount, $cashier->totalAmount());
    }

    public function cartProvider()
    {
        return [
            [
                ['Apple', 'Cherries', 'Cherries'],
                250
            ]
        ];
    }
}
