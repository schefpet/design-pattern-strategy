<?php

class CommonDataProvider
{
    /**
     * @var array
     */
    private $_data = [];

    /**
     * @var string
     */
    private $sortingAlgorithm;

    /**
     * CommonDataProvider constructor.
     *
     * @param array $data
     * @param string $sortingAlgorithm
     */
    public function __construct(array $data, string $sortingAlgorithm)
    {
        $this->_data = $data;
        $this->sortingAlgorithm = $sortingAlgorithm;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->_data;
    }

    /**
     * @return array
     * @throws Exception
     */
    public function getSortedData(): array
    {
        if ($this->sortingAlgorithm === 'bubble') {
            return $this->_getBubbleSortedData($this->_data);
        } else if ($this->sortingAlgorithm === 'quick') {
            return $this->_getQuickSortedData($this->_data);
        } else if ($this->sortingAlgorithm === 'merge') {
            return $this->_getMergeSortedData($this->_data);
        }

        throw new Exception("Sorting algorithm {$this->sortingAlgorithm} does not exist.");
    }

    /**
     * @param array $data
     * @return array
     */
    private function _getBubbleSortedData(array $data): array
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

    /**
     * @param array $data
     * @return array
     */
    private function _getQuickSortedData(array $data): array
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

        return array_merge($this->_getQuickSortedData($left), array($pivot), $this->_getQuickSortedData($right));
    }

    /**
     * @param array $data
     * @return array
     */
    private function _getMergeSortedData(array $data): array
    {
        if (count($data) <= 1) {
            return $data;
        }

        $b = array_splice($data, count($data) / 2);
        $data = $this->_getMergeSortedData($data);
        $b = $this->_getMergeSortedData($b);
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