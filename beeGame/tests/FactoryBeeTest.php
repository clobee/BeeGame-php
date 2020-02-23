<?php

declare(strict_types=1);

use php_exercices\Entity\QueenBee;
use php_exercices\Entity\DroneBee;
use php_exercices\Entity\WorkerBee;
use php_exercices\factoryBee;
use PHPUnit\Framework\TestCase;

final class FactoryBeeTest extends TestCase
{
    private $factoryBee;

    public function setUp():void {
        $this->factoryBee = new factoryBee(
            new QueenBee,
            new WorkerBee,
            new DroneBee
        );
    }

    public function test_produce_queen()
    {
        $bee = $this->factoryBee;

        $this->assertInstanceOf(
            QueenBee::class,
            $bee->getQueen()
        );

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
        $bee = $this->factoryBee;
        $workers = $bee->getWorkers($data['count']);

        foreach ($workers as $worker) {
            $this->assertInstanceOf(
                WorkerBee::class,
                $worker
            );
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
        $bee = $this->factoryBee;
        $drones = $bee->getDrones($data['count']);

        foreach ($drones as $drone) {
            $this->assertInstanceOf(
                DroneBee::class,
                $drone
            );
        }

        $this->assertSame(
            $data['result'],
            count($drones)
        );
    }

    public function provide_bees():array
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