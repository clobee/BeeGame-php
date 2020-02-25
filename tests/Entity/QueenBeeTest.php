<?php

declare(strict_types=1);

namespace php_exercices_tests\Entity;

use PHPUnit\Framework\TestCase;
use php_exercices\Entity\QueenBee;

final class QueenBeeTest extends TestCase
{
    public function test_worker_has_lifespan():void
    {
        $bee = new QueenBee();

        $this->assertSame(
            $bee->getLifespan(),
            100
        );
    }

    /**
     * @dataProvider provide_lifespan_damage_data()
     */
    public function test_worker_dammage_lifespan(array $data):void
    {
        $bee = new QueenBee();

        for ($i=0; $i < $data['hit_count']; $i++) {
            $bee->hit();
        }

        $this->assertSame(
            $bee->getLifespan(),
            $data['result']
        );
    }

    public function provide_lifespan_damage_data():array
    {
        return [[
            [
                'lifespan' => 100,
                'hit_count' => 4,
                'result' => 68
            ],
            [
                'lifespan' => 100,
                'hit_count' => 2,
                'result' => 84
            ],
            [
                'lifespan' => 100,
                'hit_count' => 1,
                'result' => 92
            ]
        ]];
    }

    /**
     * @dataProvider provide_lifespan_negative_damage_data()
     */
    public function test_worker_negative_dammage_returns_0_lifespan(array $data):void
    {
        $bee = new QueenBee();

        for ($i=0; $i < $data['hit_count']; $i++) {
            $bee->hit();
        }

        $this->assertSame(
            $bee->getLifespan(),
            $data['result']
        );
    }

    public function provide_lifespan_negative_damage_data():array
    {
        return [[
            [
                'lifespan' => 100,
                'hit_count' => 20,
                'result' => 0
            ],
            [
                'lifespan' => 100,
                'hit_count' => 2,
                'result' => 84
            ],
            [
                'lifespan' => 100,
                'hit_count' => 100,
                'result' => 0
            ]
        ]];
    }
}
