<?php

namespace EatStrategies;

class Meat implements EatStrategyInterface
{

    public function eat()
    {
        echo "Jím maso.";
    }
}