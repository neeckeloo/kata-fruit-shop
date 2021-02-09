<?php

namespace Kata\FruitShop;

use PHPUnit\Framework\TestCase;

class CashierTest extends TestCase
{
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
    public function it_create_cart(array $fruits, array $expectedTotalAmounts)
    {
        $cashier = new Cashier();

        $this->assertNotEmpty($fruits);

        foreach ($fruits as $key => $fruit) {
            $this->assertSame($expectedTotalAmounts[$key], $cashier->cash($fruit));
        }
    }

    public function cartProvider()
    {
        return [
            [
                ['Cherries', 'Pommes', 'Cherries', 'Bananas', 'Bananas'],
                [75, 175, 230, 380, 380]
            ],
            [
                ['Cherries', 'Pommes', 'Cherries', 'Bananas', 'Apple', 'Mele'],
                [75, 175, 230, 380, 480, 580]
            ],
        ];
    }
}
