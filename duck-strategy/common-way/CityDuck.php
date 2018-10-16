<?php

final class CityDuck extends AbstractDuck
{
    public function display()
    {
        echo "Jsem městská kachna.";
    }

    public function eat()
    {
        echo "Jím.";
    }

    public function fly()
    {
        echo "Létám";
    }
}