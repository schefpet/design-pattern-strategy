<?php

require_once "CommonDataProvider.php";

$options = getopt("a:");

try {
    $provider = new CommonDataProvider([1, 2, 5, 3, 7, 4, 6, 10, 9, 8], $options['a']);

    var_dump("Before: [" . implode(",", $provider->getData()) . "]");
    var_dump("After: [" . implode(",", $provider->getSortedData()) . "]");

} catch (Exception $exception) {
    var_dump($exception->getMessage());
}