<?php

namespace Halnique\Algorithms\Sort;


class Bubble implements Sortable
{
    /**
     * @see https://ja.wikipedia.org/wiki/%E3%83%90%E3%83%96%E3%83%AB%E3%82%BD%E3%83%BC%E3%83%88
     * @param array $items
     * @return array
     */
    public function sort(array $items): array
    {
        $length = count($items);

        while (true) {
            $swapped = false;

            for ($j = 0; $j < $length - 1; $j++) {
                $a = $items[$j];
                $b = $items[$j + 1];

                if ($a > $b) {
                    $items[$j + 1] = $a;
                    $items[$j] = $b;
                    $swapped = true;
                }
            }

            if (!$swapped) {
                break;
            }
        }

        return $items;
    }
}