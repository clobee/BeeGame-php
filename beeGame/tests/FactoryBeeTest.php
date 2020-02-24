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

    public function test_queen_death_kills_all_workers()
    {
        $bee = $this->factoryBee;

        $queen = $bee->getQueen();
        $workers = $bee->getWorkers(3);

        $queen->die();

        $this->assertEquals(
            $queen->getLifespan(),
            0
        );

        foreach($workers as $worker) {
            $this->assertEquals(
                $worker->getLifespan(),
                0
            );
        }
    }

    public function test_queen_death_kills_all_drones()
    {
        $bee = $this->factoryBee;

        $queen = $bee->getQueen();
        $drones = $bee->getDrones(3);

        $queen->die();

        $this->assertEquals(
            $queen->getLifespan(),
            0
        );

        foreach($drones as $drone) {
            $this->assertEquals(
                $drone->getLifespan(),
                0
            );
        }
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
