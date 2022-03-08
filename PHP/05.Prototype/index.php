<?php

namespace PHP\Prototype;

function main()
{
    $cat01 = new Cat('Persian', 'gray', 520, 100);
    $cat01->eat(new Fish());
    $cat01->eat(new Egg());
    $cat01->walk(30);

    $cat02 = clone $cat01;

    print_r($cat01);
    print_r($cat02);
}

class Cat
{
    protected $varieties;

    protected $color;

    protected $weight;

    protected $height;

    protected $stomach;

    public function __construct($varieties, $color, $weight, $height)
    {
        
    }

    public function eat(Food $food)
    {
        $stomach[] = $food;
        $weight += $food->transferWeight();
    }

    public function walk($minute)
    {
        //walk;
        $weight -= $minute * 0.25;
    }
}

abstract class Food
{
    protected $energy;

    public function transferWeight()
    {
        return $energy/2;
    }
}

class Fish extends Food
{
    protected $energy = 120;
}

class Egg extends Food
{
    protected $energy = 10;
}

main();
