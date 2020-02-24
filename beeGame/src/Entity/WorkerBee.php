<?php

declare(strict_types=1);

namespace php_exercices\Entity;

use \SplObserver;

final class WorkerBee extends AbstractBee implements InterfaceBee, SplObserver
{
    protected $lifespan = 75;
    protected $hitCost = 10;
    protected $name = "worker";

    public function update(\SplSubject $subject):void
    {
        echo "{$this->name}: {$subject->getName()} is dead!";
        $this->die();
    }
}
