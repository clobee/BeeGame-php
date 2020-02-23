<?php

declare(strict_types=1);

use php_exercices\Entity\DroneBee;
use php_exercices\Entity\WorkerBee;
use php_exercices\ManagerBee;
use PHPUnit\Framework\TestCase;

final class ManagerBeeTest extends TestCase
{
    public function test_produce_queen()
    {
        $bee = new ManagerBee();

        $this->assertSame(
            $bee->getQueen()->getLifespan(),
            100
        );
    }

    /**
     * @dataProvider provide_bees()
     */
    public function test_produce_workers($data)
    {
        $bee = new ManagerBee();
        $workers = $bee->getWorkers($data['count']);

        foreach ($workers as $worker) {
            $this->assertInstanceOf(WorkerBee::class, $worker);
        }

        $this->assertSame(
            $data['result'],
            count($workers)
        );
    }

    /**
     * @dataProvider provide_bees()
     */
    public function test_produce_drones($data)
    {
        $bee = new ManagerBee();
        $drones = $bee->getDrones($data['count']);

        foreach ($drones as $drone) {
            $this->assertInstanceOf(DroneBee::class, $drone);
        }

        $this->assertSame(
            $data['result'],
            count($drones)
        );
    }

    public function provide_bees()
    {
        return [[
            [
                'count' => 5,
                'result' => 5
            ],
            [
                'lifespan' => 10,
                'result' => 10
            ]
        ]];
    }
}
