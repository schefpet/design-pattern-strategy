<?php

interface SortingStrategy
{
    public function sort(array $data): array;
}