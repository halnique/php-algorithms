<?php


namespace Halnique\Algorithms\Search;


interface Searchable
{
    public function search(array $items, $item): ?int;
}