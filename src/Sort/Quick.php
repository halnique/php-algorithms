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
        return $items;
    }
}