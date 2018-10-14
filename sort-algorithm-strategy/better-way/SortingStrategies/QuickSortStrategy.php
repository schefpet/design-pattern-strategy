<?php

class QuickSortStrategy implements SortingStrategy
{

    public function sort(array $data): array
    {
        if (count($data) <= 1) {
            return $data;
        }

        $pivot = $data[0];
        $left = [];
        $right = [];
        for ($i = 1; $i < count($data); $i++) {
            if ($data[$i] < $pivot) {
                $left[] = $data[$i];
            } else {
                $right[] = $data[$i];
            }
        }

        return array_merge($this->sort($left), array($pivot), $this->sort($right));
    }
}