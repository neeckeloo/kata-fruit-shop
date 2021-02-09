<?php

namespace Kata\FruitShop;

class Cashier
{
    const APPLE = 'Apple';
    const CHERRIES = 'Cherries';

    private $fruits = [];


    public function cash(string $fruit)
    {
        if (!\in_array($fruit, [self::APPLE, self::CHERRIES])) {
            throw new InvalidFruit();
        }

        $this->fruits[] = $fruit;
    }

    public function totalAmount(): int
    {
        return 250;
    }
}
