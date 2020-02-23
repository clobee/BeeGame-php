<?php

declare(strict_types=1);

use php_exercices\Entity\DroneBee;
use PHPUnit\Framework\TestCase;

final class DroneBeeTest extends TestCase
{

    public function test_has_lifespan()
    {
        $bee = new DroneBee();

        $this->assertSame(
            $bee->getLifespan(),
            50
        );
    }

    /**
     * @dataProvider provide_lifespan_damage_data()
     */
    public function test_dammage_lifespan($data)
    {
        $bee = new DroneBee();

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
                'lifespan' => 50,
                'hit_count' => 4,
                'result' => 2
            ],
            [
                'lifespan' => 50,
                'hit_count' => 2,
                'result' => 26
            ],
            [
                'lifespan' => 50,
                'hit_count' => 1,
                'result' => 38
            ]
        ]];
    }

    /**
     * @dataProvider provide_lifespan_negative_damage_data()
     */
    public function test_negative_dammage_returns_0_lifespan($data)
    {
        $bee = new DroneBee();

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
                'lifespan' => 50,
                'hit_count' => 20,
                'result' => 0
            ],
            [
                'lifespan' => 50,
                'hit_count' => 2,
                'result' => 26
            ],
            [
                'lifespan' => 50,
                'hit_count' => 100,
                'result' => 0
            ]
        ]];
    }
}
