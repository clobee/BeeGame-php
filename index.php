<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

/**
 * The Bee game by Clobee
 */

use php_exercices\Game;
use php_exercices\FactoryBee;
use php_exercices\Entity\QueenBee;
use php_exercices\Entity\DroneBee;
use php_exercices\Entity\WorkerBee;

$factoryBee = new factoryBee(
    new QueenBee,
    new WorkerBee,
    new DroneBee
);

$game = new Game($factoryBee);
$game->play();

$hitResults = $game->getHitResults();
$hitlist = $game->getHitList();

$hits = array_count_values(array_values($hitlist));

echo "The Bee game by Clobee </br/>";

echo "<br /><br />\n";
echo "== HITS LIST ==";
echo str_repeat("-=", 10);
echo "<br /><br />\n";

array_walk(
    $hits,
    function ($val, $key) {
        echo "$key will be hit $val time(s)<br />\n";
    }
);

echo "<br /><br />\n";
echo "== RESULTS ==";
echo str_repeat("-=", 10);
echo "<br /><br />\n";

array_walk(
    $hitResults,
    function ($val, $key) {
        echo "$key has $val lifespan left<br />\n";
    }
);
