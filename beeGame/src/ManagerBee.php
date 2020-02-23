<?php

declare(strict_types=1);

namespace php_exercices;

use php_exercices\Entity\QueenBee;
use php_exercices\Entity\WorkerBee;
use php_exercices\Entity\DroneBee;

final class ManagerBee
{
    public function getQueen():QueenBee
    {
        $bee = new QueenBee();
        return $bee;
    }

    public function getWorkers(int $count):array
    {
        $workers = [];
        $bee = new WorkerBee();
        
        for ($i = 0; $i < $count; $i++) {
            $workers[] = clone($bee);
        }

        return $workers;
    }

    public function getDrones(int $count):array
    {
        $drones = [];
        $bee = new DroneBee();
        
        for ($i = 0; $i < $count; $i++) {
            $drones[] = clone($bee);
        }

        return $drones;
    }
}
