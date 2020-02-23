<?php

declare(strict_types=1);

namespace php_exercices\Entity;

final class DroneBee extends AbstractBee implements InterfaceBee
{
    protected $lifespan = 50;
    protected $hitCost = 12;
    protected $name = "drone";
}
