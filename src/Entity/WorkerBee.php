<?php

declare(strict_types=1);

namespace php_exercices\Entity;

use \SplObserver;

final class WorkerBee extends AbstractBee implements InterfaceBee, InterfaceQueenSubject, SplObserver
{
    /**
     * @var int
     */
    protected $lifespan = 75;

    /**
     * @var int
     */
    protected $hitCost = 10;

    /**
     * @var string
     */
    protected $name = "worker";

    public function update(\SplSubject $subject):void
    {
        $this->die();
    }
}
