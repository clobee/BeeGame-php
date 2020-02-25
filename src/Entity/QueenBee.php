<?php

declare(strict_types=1);

namespace php_exercices\Entity;

use php_exercices\Entity\InterfaceBee;
use php_exercices\Entity\InterfaceQueenSubject;

use SplObserver;
use SplSubject;
use SplObjectStorage;

final class QueenBee extends AbstractBee implements InterfaceBee, SplSubject
{
    /**
     * @var int
     */
    protected $lifespan = 100;

    /**
     * @var int
     */
    protected $hitCost = 8;

    /**
     * @var string
     */
    protected $name = 'queen';

    /**
     * @var SplObjectStorage
     */
    private $observers;

    public function __construct()
    {
        $this->observers = new SplObjectStorage();
    }

    public function attach(SplObserver $observer): void
    {
        $this->observers->attach($observer);
    }

    public function detach(SplObserver $observer): void
    {
        $this->observers->detach($observer);
    }

    public function notify(): void
    {
        foreach ($this->observers as $observer) {
            if($observer instanceof InterfaceQueenSubject) {
                $observer->update($this);
            }
        }
    }

    public function die(): void
    {
        parent::die();
        $this->notify();
    }
}
