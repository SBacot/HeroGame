<?php

use App\Personnage;
use App\Stat;

require 'vendor/autoload.php';

$ennemies = [
    new Stat("Minion", 10, 10),
    new Stat("Lieutenant Minion", 30, 30),
    new Stat("Chef Minion", 100, 100)
];


$stat = $ennemies [array_rand($ennemies)];


$hero = new Personnage(new Stat('Hero', 200, 15, 15));

$minion = new Personnage($stat);

while($hero->getLife() > 0 && $minion ->getLife() > 0) {
    $hero->bonus();
    $hero->attack($minion);
    $minion->attack($hero);
}
