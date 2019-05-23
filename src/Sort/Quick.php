<?php

namespace Halnique\Algorithms\Sort;


class Quick implements Sortable
{
    /**
     * 1. ピボットとして一つ選びそれをPとする。
     * 2. 左から順に値を調べ、P以上のものを見つけたらその位置をiとする。
     * 3. 右から順に値を調べ、P以下のものを見つけたらその位置をjとする。
     * 4. iがjより左にあるのならばその二つの位置を入れ替え、2に戻る。ただし、次の2での探索はiの一つ右、次の3での探索はjの一つ左から行う。
     * 5. 2に戻らなかった場合、iの左側を境界に分割を行って2つの領域に分け、そのそれぞれに対して再帰的に1からの手順を行う。要素数が1以下の領域ができた場合、その領域は確定とする。
     *
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