<?php


namespace Halnique\Algorithms\Search;


class Binary implements Searchable
{
    /**
     * @see https://ja.wikipedia.org/wiki/%E4%BA%8C%E5%88%86%E6%8E%A2%E7%B4%A2
     * @param array $items
     * @param $item
     * @return bool
     */
    public function search(array $items, $item): bool
    {
        $length = count($items);

        if ($length === 1) {
            return $item === array_shift($items);
        }

        $centerIndex = (int)floor($length / 2);
        $centerItem = $items[$centerIndex];

        if ($item === $centerItem) {
            return true;
        }


        if ($item < $centerItem) {
            $items = array_slice($items, 0, $centerIndex);
        } else {
            $items = array_slice($items, $centerIndex);
        }

        return $this->search($items, $item);
    }
}