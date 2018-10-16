<?php

final class WildDuck extends AbstractDuck
{
    public function display()
    {
        echo "Jsem divoká kachna.";
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