<?php

declare(strict_types=1);

namespace php_exercices_tests;

use php_exercices\FactoryBee;
use php_exercices\Entity\QueenBee;
use php_exercices\Entity\DroneBee;
use php_exercices\Entity\WorkerBee;
use php_exercices\Game;

use PHPUnit\Framework\TestCase;

final class GameTest extends TestCase
{
    public function test_that_after_play_hitlist_matches_hitresults(): void
    {
        $factoryBee = new factoryBee(
            new QueenBee,
            new WorkerBee,
            new DroneBee
        );

        $game = new Game($factoryBee);
        $game->play();

        $hitResults = $game->getHitResults();
        $hitlist = $game->getHitList();

        $hits = array_unique($hitlist);
        $hits = array_values($hits);

        $results = array_keys($hitResults);

        $this->assertEquals(
            $hits,
            $results
        );
    }

    public function provide_hitlist(): array
    {
        $factoryBee = new factoryBee(
            new QueenBee,
            new WorkerBee,
            new DroneBee
        );

        $workers = $factoryBee->getWorkers(3);
        $drones = $factoryBee->getDrones(4);

        return [[
            [
                'bees' => [
                    'queen' => $factoryBee->getQueen(),
                    'workers.0' => $workers[0],
                    'workers.1' => $workers[1],
                    'drones.0' => $drones[0],
                    'drones.1' => $drones[1],
                    'drones.2' => $drones[2],
                ],
                'hitlist' => [
                    "workers.0",
                    "workers.0",
                    "drones.1",
                    "drones.1",
                    "queen",
                    "queen",
                    "workers.0",
                ],
                'result' => [
                    "workers.0" => 45,
                    "drones.1" => 26,
                    "queen" => 84
                ]
            ],
            [
                'bees' => [
                    'queen' => $factoryBee->getQueen(),
                    'workers.0' => $workers[0],
                    'workers.1' => $workers[1],
                    'drones.0' => $drones[0],
                    'drones.1' => $drones[1],
                    'drones.2' => $drones[2],
                ],
                'hitlist' => [
                    "workers.0",
                    "drones.1",
                    "drones.1",
                    "workers.0",
                    "queen",
                    "queen",
                    "queen",
                    "queen",
                    "queen",
                    "queen",
                    "workers.0",
                ],
                'result' => [
                    "workers.0" => 0,
                    "drones.1" => 0,
                    "queen" => 0
                ]
            ],
            [
                'bees' => [
                    'queen' => $factoryBee->getQueen(),
                    'workers.0' => $workers[0],
                    'workers.1' => $workers[1],
                    'drones.0' => $drones[0],
                    'drones.1' => $drones[1],
                    'drones.2' => $drones[2],
                ],
                'hitlist' => [
                    "workers.0",
                    "drones.0",
                    "drones.1",
                    "workers.0",
                ],
                'result' => [
                    "workers.0" => 55,
                    "drones.1" => 26
                ]
            ]
        ]];
    }
}
