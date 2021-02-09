<?php

namespace Kata\FruitShop;

class Cashier
{
    const APPLE = 'Apple';
    const CHERRIES = 'Cherries';
    const BANANAS = 'Bananas';

    private $fruits = [
        self::APPLE => 0,
        self::CHERRIES => 0,
        self::BANANAS => 0,
    ];

    private $totalAmount = 0;

    public function cash(string $fruit)
    {
        if (!\in_array($fruit, [self::APPLE, self::CHERRIES, self::BANANAS])) {
            throw new InvalidFruit();
        }

        $this->fruits[$fruit]++;

        switch ($fruit) {
            case self::APPLE:
                $this->totalAmount += 100;
                break;
            case self::CHERRIES:
                $this->totalAmount += 75;
                break;
            case self::BANANAS:
                $this->totalAmount += 150;
                break;
        }

        $discount = (int) (\floor($this->fruits[self::CHERRIES] / 2) * 20);

        return $this->totalAmount - $discount;
    }
}
