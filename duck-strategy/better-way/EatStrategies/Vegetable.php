<?php

namespace EatStrategies;

class Vegetable implements EatStrategyInterface
{

    public function eat()
    {
        echo "Jím zeleninu.";
    }
}