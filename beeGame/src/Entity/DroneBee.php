<?php

declare(strict_types=1);

namespace php_exercices\Entity;

use \SplObserver;

final class DroneBee extends AbstractBee implements InterfaceBee, SplObserver
{
    protected $lifespan = 50;
    protected $hitCost = 12;
    protected $name = "drone";

    public function update(\SplSubject $subject):void
    {
        $this->die();
    }
}
