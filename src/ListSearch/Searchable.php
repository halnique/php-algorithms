<?php


namespace Halnique\Algorithms\ListSearch;


interface Searchable
{
    public function search(array $items, $item): bool;
}