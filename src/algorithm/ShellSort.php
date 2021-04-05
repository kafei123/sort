<?php

/**
 * 希尔排序
 * 
 * 时间复杂度：平均情况：O(nlog2n)， 最好情况：O(nlog2n)， 最坏情况：O(nlog2n)
 * 
 * 空间复杂度：O(n)
 * 
 * 稳定性：稳定
 */

namespace Xlcoffee\algorithm;

class ShellSort implements XlSortInterface
{ 
    /**
     * 执行
     */
    public function sort(array $array = [], string $sortingtype): array
    { 
        // 获取数组长度
        $len = count($array);
        $step = 2;
        $gap = intval($len / $step);
        while ($gap > 0) {
            for ($gi = 0; $gi < $gap; $gi++) {
                for ($i = $gi; $i < $len; $i += $gap) {
                    $key = $array[$i];
                    for ($j = $i - $gap; $j >= 0 && $array[$j] > $key; $j -= $gap) {
                        $array[$j + $gap] = $array[$j];
                        $array[$j] = $key;
                    }
                }
            }
            $gap = intval($gap / $step);
        }
        return $array;
    }
}