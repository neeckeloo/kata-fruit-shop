<?php

namespace Kata\FruitShop;
class Cashier
{
    const APPLE = 'Apple';
    const POMMES = 'Pommes';
    const MELE = 'Mele';
    const CHERRIES = 'Cherries';
    const BANANAS = 'Bananas';

    const BANANAS_PRICE = 150;
    const CHERRIES_PRICE = 75;
    const APPLE_PRICE = 100;

    const DISCOUNT_CHERRIES = 20;

    private $fruits = [
        self::APPLE => 0,
        self::CHERRIES => 0,
        self::BANANAS => 0,
    ];
    private $totalAmount = 0;

    public function cash(string $fruit)
    {
        if (!\in_array($fruit, [self::APPLE, self::CHERRIES, self::BANANAS, self::POMMES, self::MELE])) {
            throw new InvalidFruit();
        }

        switch ($fruit) {
            case self::APPLE:
            case self::POMMES:
            case self::MELE:
                $this->fruits[self::APPLE]++;
                $this->totalAmount += self::APPLE_PRICE;
                break;
            case self::CHERRIES:
                $this->fruits[self::CHERRIES]++;
                $this->totalAmount += self::CHERRIES_PRICE;
                break;
            case self::BANANAS:
                $this->fruits[self::BANANAS]++;
                $this->totalAmount += self::BANANAS_PRICE;
                break;
        }

        $discountCherries = (int) (\floor($this->fruits[self::CHERRIES] / 2) * self::DISCOUNT_CHERRIES);
        $discountBanana = (int) (\floor($this->fruits[self::BANANAS] / 2) * self::BANANAS_PRICE);

        return $this->totalAmount - $discountCherries - $discountBanana;
    }

    public function cashFromCsv(string $fruits)
    {
        $fruits = explode(',', $fruits);

        foreach ($fruits as $fruit) {
            $amount = $this->cash($fruit);
        }

        return $amount;
    }
}
