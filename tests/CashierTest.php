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
                ['Cherries', 'Cherries'],
                [75, 130]
            ],
            [
                ['Cherries', 'Cherries', 'Cherries'],
                [75, 130, 205]
            ],
            [
                ['Apple', 'Cherries', 'Cherries'],
                [100, 175, 230]
            ],
            [
                ['Cherries', 'Apple', 'Cherries', 'Bananas', 'Cherries', 'Cherries', 'Apple'],
                [75, 175, 230, 380, 455, 510, 610]
            ],
            [
                ['Cherries', 'Pommes', 'Cherries', 'Bananas', 'Bananas'],
                [75, 175, 230, 380, 380]
            ],
        ];
    }
}
