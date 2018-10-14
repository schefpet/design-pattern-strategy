<?php

class BubbleSortStrategy implements SortingStrategy
{

    public function sort(array $data): array
    {
        if (count($data) <= 1) {
            return $data;
        }

        do {
            $swapped = false;
            for ($i = 0, $c = count($data) - 1; $i < $c; $i++) {
                if ($data[$i] > $data[$i + 1]) {
                    list($data[$i + 1], $data[$i]) = [$data[$i], $data[$i + 1]];
                    $swapped = true;
                }
            }
        } while ($swapped);

        return $data;
    }
}