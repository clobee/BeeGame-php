<?php

declare(strict_types=1);

namespace php_exercices;

use php_exercices\Entity\QueenBee;
use php_exercices\Entity\WorkerBee;
use php_exercices\Entity\DroneBee;

final class FactoryBee
{
    const WORKERS_COUNT = 5;
    const DRONES_COUNT = 8;

    /**
     * @var \php_exercices\Entity\QueenBee
     */
    private $queen;

    /**
     * @var \php_exercices\Entity\WorkerBee
     */
    private $worker;

    /**
     * @var \php_exercices\Entity\DroneBee
     */
    private $drone;

    public function __construct(
        QueenBee $queen,
        WorkerBee $worker,
        DroneBee $drone
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
            $workers[$i] = clone($this->worker);
            $this->queen->attach($workers[$i]);
        }

        return $workers;
    }

    public function getDrones(int $count):array
    {
        $drones = [];

        for ($i = 0; $i < $count; $i++) {
            $drones[$i] = clone($this->drone);
            $this->queen->attach($drones[$i]);
        }

        return $drones;
    }

    public function getColony(): array
    {
        $bees = [];

        $bees['queen'] = $this->getQueen();

        $workers = $this->getWorkers(self::WORKERS_COUNT);
        foreach ($workers as $key => $worker) {
            $bees['workers.' . $key] = $worker;
        }

        $drones = $this->getDrones(self::DRONES_COUNT);
        foreach ($drones as $key => $drone) {
            $bees['drones.' . $key] = $drone;
        }

        return $bees;
    }
}
