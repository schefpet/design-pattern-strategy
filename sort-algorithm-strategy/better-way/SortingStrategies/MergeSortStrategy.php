<?php

class MergeSortStrategy implements SortingStrategy
{

    public function sort(array $data): array
    {
        if (count($data) <= 1) {
            return $data;
        }

        $b = array_splice($data, count($data) / 2);
        $data = $this->sort($data);
        $b = $this->sort($b);
        $o = [];
        while (!empty($data) || !empty($b)) {
            if (empty($data) || empty($b)) {
                $o[] = empty($data) ? array_shift($b) : array_shift($data);
            } else {
                $o[] = $data[0] > $b[0] ? array_shift($b) : array_shift($data);
            }
        }

        return $o;
    }
}