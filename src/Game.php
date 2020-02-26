<?php

declare(strict_types=1);

namespace php_exercices;

use php_exercices\FactoryBee;

final class Game
{
    /**
     * @var \php_exercices\FactoryBee
     */
    private $factoryBee;

    /**
     * @var array
     */
    private $hitResult = [];

    /**
     * @var array
     */
    private $hitList = [];

    public function __construct(
        FactoryBee $factoryBee
    ) {
        $this->factoryBee = $factoryBee;
    }

    public function play(): void
    {
        $colony = $this->factoryBee->getColony();
        $this->hitList = $this->generateHitList($colony);

        foreach ($this->hitList as $beeId) {
            $bee = $colony[$beeId];
            $bee->hit();
            $this->hitResult[$beeId] = $bee->getLifespan();
        }
    }

    public function getHitResults(): array
    {
        return $this->hitResult;
    }

    public function getHitList(): array
    {
        return $this->hitList;
    }

    private function getShuffledColonySlice(array $colony): array
    {
        $beeList = array_keys($colony);
        $limit = count($beeList)-1;
        shuffle($beeList);
        return array_slice($beeList, 0, random_int(1, $limit));
    }

    private function generateHitList(array $colony): array
    {
        $randomColony = $this->getShuffledColonySlice($colony);
        $hitList = $this->multiplyEachHit($randomColony);
        shuffle($hitList);
        return $hitList;
    }

    private function multiplyEachHit(array $randomColony): array
    {
        $hitList = [];
        $limit = count($randomColony)-1;

        foreach ($randomColony as $bee) {
            $rand = random_int(1, $limit);
            for ($i=0; $i < $rand; $i++) {
                $hitList[] = $bee;
            }
        }

        return $hitList;
    }
}
