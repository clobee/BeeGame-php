<?php

declare(strict_types=1);

namespace php_exercices\Entity;

final class WorkerBee extends AbstractBee implements InterfaceBee
{
    protected $lifespan = 75;
    protected $hitCost = 10;
    protected $name = "worker";
}
