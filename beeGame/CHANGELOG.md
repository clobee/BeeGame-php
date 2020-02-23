

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

At this point I can go ahead and add an `index.php` file to the project.  
This will be the entry point of the application.














For this exercice, I am going to run through how I solve the PHP Coding Test "The Bee Game" (with an explanation of each steps).

See the document CHANGELOG.md for more details on the steps.

**The exercice**

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


**Installation**

composer install

**Tests**

//@todo




