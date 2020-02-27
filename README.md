
# PHP Coding Test : Bee game

[![CircleCI](https://circleci.com/gh/clobee/BeeGame-php.svg?style=svg)](https://circleci.com/gh/clobee/BeeGame-php)

## The challenge

There are three types of bees in this game:

- **Queen Bee**  
    The Queen Bee has a lifespan of 100 Hit Points.
    When the Queen Bee is hit, 8 Hit Points are deducted from her lifespan.
    If/When the Queen Bee has run out of Hit Points, All remaining alive Bees automatically run out of hit points.
    There is only 1Queen Bee.

- **Worker Bee**  
    Worker Bees have a lifespan of 75 Hit Points.
    When a Worker Bee is hit, 10 Hit Pointsare deducted from his lifespan.
    There are 5Worker Bees.

- **Drone Bee**  
    Drone Bees have a lifespan of 50 Hit Points.
    When a Drone Bee is hit, 12 Hit Points are deducted from his lifespan.
    There are 8 Drone Bees.

______________


## Installation

`composer install`

## Usage

Start the php built-in server `php -S localhost:8888` and visit `http://localhost:8888`.  

Refresh the page to start a new round...

## Tests

`composer test`
