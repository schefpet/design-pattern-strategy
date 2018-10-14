<?php

class BetterDataProvider
{
    /**
     * @var array
     */
    private $_data = [];

    /**
     * @var string
     */
    private $sortingStrategy;

    /**
     * BetterDataProvider constructor.
     *
     * @param array $data
     * @param SortingStrategy $sortingStrategy
     */
    public function __construct(array $data, SortingStrategy $sortingStrategy)
    {
        $this->_data = $data;
        $this->sortingStrategy = $sortingStrategy;
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
        return $this->sortingStrategy->sort($this->_data);
    }
}