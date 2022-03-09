<?php

namespace PHP\Prototype;

function main()
{
    $cat01 = new Cat('sufi','Persian', 'gray', 520, 100);
    $cat01->eat(new Fish());
    $cat01->eat(new Egg());
    $cat01->walk(30);

    $cat02 = clone $cat01;

    print_r($cat02);
    print_r($cat01);
}

class Cat
{
    protected $name;

    protected $varieties;

    protected $color;

    protected $weight;

    protected $height;

    protected $stomach = [];

    public function __construct($name, $varieties, $color, $weight, $height)
    {
        $this->name = $name;
        $this->varieties = $varieties;
        $this->color = $color;
        $this->weight = $weight;
        $this->height = $height;
    }

    public function eat(Food $food)
    {
        $this->stomach[] = $food;
        $this->weight += $food->transferWeight();
    }

    public function walk($minute)
    {
        //walk;
        $this->weight -= $minute * 0.25;
    }

    public function __clone()
    {
        $this->name = $this->name . " copy";
    }
}

abstract class Food
{
    protected $energy;

    public function transferWeight()
    {
        return $this->energy/2;
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
