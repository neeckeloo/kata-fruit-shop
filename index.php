<?php

use Kata\FruitShop\Cashier;

require __DIR__ . './vendor/autoload.php';

$cashier = new Cashier();

while (true) {
    echo "> ";
    $command = read_stdin();
    echo $command . " added, total is " . $cashier->cash($command) . PHP_EOL;
    sleep(1);
}

function read_stdin()
{
    $fr = fopen("php://stdin", "r");
    $input = fgets($fr, 128);
    $input = rtrim($input);
    fclose($fr);

    return $input;
}
