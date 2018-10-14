<?php

require_once "BetterDataProvider.php";
require_once(dirname(__FILE__) . "/SortingStrategies/SortingStrategy.php");
require_once(dirname(__FILE__) . "/SortingStrategies/BubbleSortStrategy.php");
require_once(dirname(__FILE__) . "/SortingStrategies/QuickSortStrategy.php");
require_once(dirname(__FILE__) . "/SortingStrategies/MergeSortStrategy.php");

$options = getopt("a:");

try {
    switch ($options['a']) {
        case "bubble":
            $strategy = new BubbleSortStrategy();
            break;
        case "quick":
            $strategy = new QuickSortStrategy();
            break;
        case "merge":
            $strategy = new MergeSortStrategy();
            break;
        default:
            throw new Exception("Sorting algorithm {$this->sortingAlgorithm} does not exist.");

    }

    $provider = new BetterDataProvider([1, 2, 5, 3, 7, 4, 6, 10, 9, 8], $strategy);

    var_dump("Before: [" . implode(",", $provider->getData()) . "]");
    var_dump("After: [" . implode(",", $provider->getSortedData()) . "]");
} catch (Exception $exception) {
    var_dump($exception->getMessage());
}