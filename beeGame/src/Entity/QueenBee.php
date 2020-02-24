<?php

declare(strict_types=1);

namespace php_exercices\Entity;

use php_exercices\Entity\InterfaceBee;
use \SplObserver;
use \SplSubject;
use \SplObjectStorage;

final class QueenBee extends AbstractBee implements InterfaceBee, SplSubject
{
    protected $lifespan = 100;
    protected $hitCost = 8;
    protected $name = "queen";

    private $observers;

    public function __construct()
    {
        $this->observers = new SplObjectStorage();
    }

    public function attach(SplObserver $observer)
    {
        $this->observers->attach($observer);
    }

    public function detach(SplObserver $observer)
    {
        $this->observers->detach($observer);
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}
