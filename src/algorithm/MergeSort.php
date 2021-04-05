<?php

/**
 * 归并排序
 * 
 * 时间复杂度：平均情况：O(nlog2n)， 最好情况：O(nlog2n)， 最坏情况：O(nlog2n)
 * 
 * 空间复杂度：O(n)
 * 
 * 稳定性：稳定
 */

namespace Xlcoffee\algorithm;

use Xlcoffee\XlSortConfig;

class MergeSort implements XlSortInterface
{ 
    /**
     * 执行
     */
    public function sort(array $array = [], string $sortingtype): array
    { 
        // 获取数组长度
        $len = count($array);

        if ($len <= 1) {
            return $array;
        }

        $array_left = $this->sort(array_slice($array, 0, floor($len / 2)), $sortingtype);
        $array_right = $this->sort(array_slice($array, floor($len / 2)), $sortingtype);

        // 获取数组长度
        if ($sortingtype == XlSortConfig::SORT_DESC) { 
            $array = $this->sortDesc($array_left, $array_right);
        } else { 
            $array = $this->sortAsc($array_left, $array_right);
        }

        return $array;
    }

    /**
     * 倒序
     * 
     * @param array $array 排序的数组
     * @return array
     */
    public function sortDesc (array $array_left, array $array_right): array
    { 
        $array = [];
        $i = $j = 0;
        while ($i < count($array_left) && $j < count($array_right)) {
            if ($array_left[$i] > $array_right[$j]) {
                $array[] = $array_left[$i];
                $i++;
            } else {
                $array[] = $array_right[$j];
                $j++;
            }
        }
        $array = array_merge($array, array_slice($array_left, $i));
        $array = array_merge($array, array_slice($array_right, $j));
        return $array;
    }

    /**
     * 正序
     * 
     * @param array $array_left 左数组
     * @param array $array_right 右数组
     * @return array
     */
    public function sortAsc (array $array_left, array $array_right): array
    { 
        $array = [];
        $i = $j = 0;
        while ($i < count($array_left) && $j < count($array_right)) {
            if ($array_left[$i] < $array_right[$j]) {
                $array[] = $array_left[$i];
                $i++;
            } else {
                $array[] = $array_right[$j];
                $j++;
            }
        }
        $array = array_merge($array, array_slice($array_left, $i));
        $array = array_merge($array, array_slice($array_right, $j));
        return $array;
    }
}