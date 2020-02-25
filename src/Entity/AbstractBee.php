<?php

declare(strict_types=1);

namespace php_exercices\Entity;

abstract class AbstractBee
{
        /**
     * @var int
     */
    protected $lifespan;

    /**
     * @var int
     */
    protected $hitCost;

    /**
     * @var string
     */
    protected $name;

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

    public function die():void
    {
        $this->setLifespan(0);
    }

    private function setLifespan(int $lifespan):void
    {
        $this->lifespan = $lifespan;
    }

    public function hit():void
    {
        $newLifespan = $this->getLifespan() - $this->getHitCost();

        if ($newLifespan > 0) {
            $this->setLifespan($newLifespan);
        } else {
            $this->die();
        }
    }
}
