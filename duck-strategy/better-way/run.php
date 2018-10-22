<?php
require_once(dirname(__FILE__) . "/DisplayStrategies/DisplayStrategyInterface.php");
require_once(dirname(__FILE__) . "/EatStrategies/EatStrategyInterface.php");
require_once(dirname(__FILE__) . "/FlyStrategies/FlyStrategyInterface.php");

require_once(dirname(__FILE__) . "/Duck.php");
require_once(dirname(__FILE__) . "/DisplayStrategies/CityDuck.php");
require_once(dirname(__FILE__) . "/DisplayStrategies/WildDuck.php");
require_once(dirname(__FILE__) . "/DisplayStrategies/RubberDuck.php");

require_once(dirname(__FILE__) . "/EatStrategies/Eat.php");
require_once(dirname(__FILE__) . "/EatStrategies/DoNotEat.php");

require_once(dirname(__FILE__) . "/FlyStrategies/Fly.php");
require_once(dirname(__FILE__) . "/FlyStrategies/DoNotFly.php");


$options = getopt("t:");

try {
    switch ($options['t']){
        case 'wild':
            $displayStrategy = new \DisplayStrategies\WildDuck();
            $eatStrategy = new \EatStrategies\Eat();
            $flyStrategy = new \FlyStrategies\Fly();

            $duck = new Duck($flyStrategy, $eatStrategy, $displayStrategy);
            break;
        case 'city':
            $displayStrategy = new \DisplayStrategies\CityDuck();
            $eatStrategy = new \EatStrategies\Eat();
            $flyStrategy = new \FlyStrategies\Fly();

            $duck = new Duck($flyStrategy, $eatStrategy, $displayStrategy);
            break;
        case 'rubber':
            $displayStrategy = new \DisplayStrategies\RubberDuck();
            $eatStrategy = new \EatStrategies\DoNotEat();
            $flyStrategy = new \FlyStrategies\DoNotFly();

            $duck = new Duck($flyStrategy, $eatStrategy, $displayStrategy);
            break;
        default:
            throw new Exception("Duck type {$options['t']} does not exist.");
    }

    $duck->display();
    echo "\n";
    $duck->eat();
    echo "\n";
    $duck->fly();
    echo "\n";

} catch (Exception $exception) {
    var_dump($exception->getMessage());
}