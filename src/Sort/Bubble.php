<?php

namespace Halnique\Algorithms\Sort;


class Bubble implements Sortable
{
    /**
     * 要素aとその隣の要素bを比較し、a > bなら入れ替えるという操作を(要素数 - 1)回繰り返す
     * 入れ替えが一度も発生しなければそのループで抜けてしまってもOK
     *
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
                // 入れ替える
                if ($a > $b) {
                    $items[$j + 1] = $a;
                    $items[$j] = $b;
                    $swapped = true;
                }
            }
            // 入れ替えが発生しなければ中断
            if (!$swapped) {
                break;
            }
        }

        return $items;
    }
}