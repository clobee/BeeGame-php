<?php

declare(strict_types=1);

namespace php_exercices\Entity;

use \SplObserver;

final class DroneBee extends AbstractBee implements InterfaceBee, InterfaceQueenSubject, SplObserver
{
    /**
     * @var int
     */
    protected $lifespan = 50;

    /**
     * @var int
     */
    protected $hitCost = 12;

    /**
     * @var string
     */
    protected $name = "drone";

    public function update(\SplSubject $subject):void
    {
        $this->die();
    }
}
