<?php

declare(strict_types=1);

namespace php_exercices\Entity;

final class QueenBee extends AbstractBee implements InterfaceBee
{
    protected $lifespan = 100;
    protected $hitCost = 8;
    protected $name = "queen";
}
