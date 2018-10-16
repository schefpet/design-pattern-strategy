<?php


class Duck
{
    private $_flyStrategy;

    private $_eatStrategy;

    private $_displayStrategy;

    public function __construct(
        \FlyStrategies\FlyStrategyInterface $flyStrategy,
        \EatStrategies\EatStrategyInterface $eatStrategy,
        \DisplayStrategies\DisplayStrategyInterface $displayStrategy
    )
    {
        $this->_flyStrategy = $flyStrategy;
        $this->_eatStrategy = $eatStrategy;
        $this->_displayStrategy = $displayStrategy;
    }

    public function fly()
    {
        $this->_flyStrategy->fly();
    }

    public function eat()
    {
        $this->_eatStrategy->eat();
    }

    public function display()
    {
        $this->_displayStrategy->display();
    }
}