<?php

declare(strict_types=1);

namespace php_exercices;

use php_exercices\Entity\InterfaceBee;
use php_exercices\Entity\QueenBee;

final class ManagerBee
{
    private $queen;
    private $worker;
    private $drone;

    public function __construct(
        InterfaceBee $queen,
        InterfaceBee $worker,
        InterfaceBee $drone
    ) {
        $this->queen = $queen;
        $this->worker = $worker;
        $this->drone = $drone;
    }

    public function getQueen():QueenBee
    {
        return $this->queen;
    }

    public function getWorkers(int $count):array
    {
        $workers = [];
        
        for ($i = 0; $i < $count; $i++) {
            $workers[] = clone($this->worker);
        }

        return $workers;
    }

    public function getDrones(int $count):array
    {
        $drones = [];

        for ($i = 0; $i < $count; $i++) {
            $drones[] = clone($this->drone);
        }

        return $drones;
    }
}
