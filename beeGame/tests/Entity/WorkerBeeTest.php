<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use php_exercices\Entity\WorkerBee;

final class WorkerBeeTest extends TestCase
{
    public function test_worker_has_lifespan()
    {
        $bee = new WorkerBee();

        $this->assertSame(
            $bee->getLifespan(),
            75
        );
    }

    /**
     * @dataProvider provide_lifespan_damage_data()
     */
    public function test_worker_dammage_lifespan($data)
    {
        $bee = new WorkerBee();

        for($i=0; $i < $data['hit_count']; $i++) {
            $bee->hit();
        }

        $this->assertSame(
            $bee->getLifespan(),
            $data['result']
        );
    }

    public function provide_lifespan_damage_data() {
        return [[
            [
                'lifespan' => 75,
                'hit_count' => 4,
                'result' => 35
            ],
            [
                'lifespan' => 75,
                'hit_count' => 2,
                'result' => 55
            ],
            [
                'lifespan' => 75,
                'hit_count' => 1,
                'result' => 65
            ]
        ]];
    }

    /**
     * @dataProvider provide_lifespan_negative_damage_data()
     */
    public function test_worker_negative_dammage_returns_0_lifespan($data)
    {
        $bee = new WorkerBee();

        for($i=0; $i < $data['hit_count']; $i++) {
            $bee->hit();
        }

        $this->assertSame(
            $bee->getLifespan(),
            $data['result']
        );
    }

    public function provide_lifespan_negative_damage_data() {
        return [[
            [
                'lifespan' => 75,
                'hit_count' => 20,
                'result' => 0
            ],
            [
                'lifespan' => 75,
                'hit_count' => 2,
                'result' => 55
            ],
            [
                'lifespan' => 75,
                'hit_count' => 100,
                'result' => 0
            ]
        ]];
    }
}
