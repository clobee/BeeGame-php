<?php

declare(strict_types=1);

namespace php_exercices\Entity;

abstract class AbstractBee
{
    public function getName():string
    {
        return $this->name;
    }

    public function getLifespan():int
    {
        return $this->lifespan;
    }

    public function getHitCost():int
    {
        return $this->hitCost;
    }

    public function die():void {
        $this->setLifespan(0);
    }

    private function setLifespan(int $lifespan):void
    {
        $this->lifespan = $lifespan;
    }

    public function hit():void
    {
        $newLifespan = $this->getLifespan() - $this->getHitCost();

        if ($newLifespan < 0) {
            $newLifespan = 0;
        }
        
        $this->setLifespan($newLifespan);
    }
}
