<?php

/**
 * 基数排序
 * 
 * 时间复杂度：平均情况：O(nlog2n)， 最好情况：O(nlog2n)， 最坏情况：O(nlog2n)
 * 
 * 空间复杂度：O(n)
 * 
 * 稳定性：稳定
 */

namespace Xlcoffee\algorithm;

class RadixSort implements XlSortInterface
{ 
    /**
     * 执行
     */
    public function sort(array $array = [], string $sortingtype): array
    { 
        $radix = 10;
        $max = max($array);
        $k = ceil(log($max, $radix));
        if ($max == pow($radix, $k)) {
            $k++;
        }
        for ($i = 1; $i <= $k; $i++) {
            $newarray = array_fill(0, $radix, []);
            for ($j = 0; $j < count($array); $j++) {
                $key = $array[$j] / pow($radix, $i - 1) % $radix;
                $newarray[$key][] = $array[$j];
            }
            $array = [];
            for ($j = 0; $j < $radix; $j++) {
                $array = array_merge($array, $newarray[$j]);
            }
        }
        return $array;
    }
}