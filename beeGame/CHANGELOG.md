### Bee game

### Initialisation

The first step is to initialise the project with composer:

```bash 
composer init;
```

Here is my final `composer.json`

```json
{
    "name": "php_exercices/bee-game",
    "description": "The bee game by Clobee",
    "type": "project",
    "license": "free",
    "require": {}
}
```

I want packages that are for PHP `^7.3` so I can go ahead and update my json with

```json
{
    ...
    "require": {
        "php" : "^7.3"
    }
}
```

I am also adding the folder that will host my code 

```json
{
    "autoload": {
        "psr-4": {
            "php_exercices\\": "src/"
        }
    },
}
```

At this point I can go ahead and add an `index.php` file to the project.  
This will be the entry point of the application.

### Requirements analyse

Let's review the requirements to analyse what required to tackle this project. 

**The exercice**

There are three types of bees in this game:

- **Queen Bee**  
    The Queen Bee has a lifespan of 100 Hit Points.
    When the Queen Bee is hit, 8 Hit Points are deducted from her lifespan.
    If/When the Queen Bee has run out of Hit Points, All remaining alive Bees automatically run out of hit points.
    There is only 1 Queen Bee.

- **Worker Bee**  
    Worker Bees have a lifespan of 75 Hit Points.
    When a Worker Bee is hit, 10 Hit Points are deducted from his lifespan.
    There are 5 Worker Bees.

- **Drone Bee**  
    Drone Bees have a lifespan of 50 Hit Points.
    When a Drone Bee is hit, 12 Hit Points are deducted from his lifespan.
    There are 8 Drone Bees.

_⚡ I understand that I will need a minimum of 3 classes (Queen, Worker and Drone) and an interface Bee. All type of bees have a lifespan and some sort of damage cost._

_⚡ The Queen kills all Bees situation requires some sort notification implementation, for that I will use the Observer pattern._

Let's do the magic...

### Let's write some basic code

For this project I need phpunit

```bash
composer require --dev phpunit/phpunit ^9.0
```
Let's add the Tests 

```
tests/Entity/DroneBeeTests.php
tests/Entity/QueenBeeTests.php
tests/Entity/WorkerBeeTests.php
```

and the required classes 

```
src/Entity/InterfaceBee.php
src/Entity/AbstractBee.php
src/Entity/DroneBee.php
src/Entity/QueenBee.php
src/Entity/WorkerBee.php
```
