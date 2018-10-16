<?php
require_once(dirname(__FILE__) . "/AbstractDuck.php");
require_once(dirname(__FILE__) . "/WildDuck.php");
require_once(dirname(__FILE__) . "/CityDuck.php");
require_once(dirname(__FILE__) . "/RubberDuck.php");


$options = getopt("t:");

try {
    switch ($options['t']) {
        case 'wild':
            $duck = new WildDuck();
            break;
        case 'city':
            $duck = new CityDuck();
            break;
        case 'rubber':
            $duck = new RubberDuck();
            break;
        default:
            throw new Exception("Duck type {$options['t']} does not exist.");
    }

    $duck->display();
    echo "\n";

    if ($duck instanceof WildDuck || $duck instanceof CityDuck) {
        $duck->eat();
        echo "\n";
    }

    $duck->fly();
    echo "\n";

} catch (Exception $exception) {
    var_dump($exception->getMessage());
}