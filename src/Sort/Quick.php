<?php

namespace Halnique\Algorithms\Sort;


class Quick implements Sortable
{
    /**
     * @see https://ja.wikipedia.org/wiki/%E3%82%AF%E3%82%A4%E3%83%83%E3%82%AF%E3%82%BD%E3%83%BC%E3%83%88
     * @param array $items
     * @return array
     */
    public function sort(array $items): array
    {
        return $this->sortRecursive($items, 0, count($items) - 1, $items[array_rand($items)]);
    }

    private function sortRecursive(array $items, int $start, int $end, $pivot): array
    {
        $leftIndex = $this->searchLeft($items, $pivot, $start);
        $rightIndex = $this->searchRight($items, $pivot, $end);

        if ($leftIndex < $rightIndex) {
            $items = $this->swap($items, $leftIndex, $rightIndex);
            return $this->sortRecursive($items, $leftIndex + 1, $rightIndex - 1, $pivot);
        }

        [$leftItems, $rightItems] = $this->slice($items, $leftIndex);

        if (count($leftItems) > 1) {
            $leftItems = $this->sort($leftItems);
        }

        if (count($rightItems) > 1) {
            $rightItems = $this->sort($rightItems);
        }

        return array_merge($leftItems, $rightItems);
    }

    private function searchLeft(array $items, $pivot, int $offset): int
    {
        $length = count($items);
        for ($index = $offset; $index < $length; $index++) {
            $item = $items[$index];

            if ($item < $pivot) {
                continue;
            }

            break;
        }

        return $index;
    }

    private function searchRight(array $items, $pivot, int $offset): int
    {
        for ($index = $offset; $index >= 0; $index--) {
            $item = $items[$index];

            if ($item > $pivot) {
                continue;
            }

            break;
        }

        return $index;
    }

    private function swap(array $items, int $baseIndex, int $targetIndex): array
    {
        $baseItem = $items[$baseIndex];
        $targetItem = $items[$targetIndex];
        $items[$baseIndex] = $targetItem;
        $items[$targetIndex] = $baseItem;
        return $items;
    }

    private function slice(array $items, int $index): array
    {
        $leftItems = array_slice($items, 0, $index);
        $rightItems = array_slice($items, $index);
        return [$leftItems, $rightItems];
    }
}