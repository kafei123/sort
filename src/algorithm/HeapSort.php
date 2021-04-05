<?php

/**
 * 堆排序
 * 
 * 时间复杂度：平均情况：O(nlog2n)， 最好情况：O(nlog2n)， 最坏情况：O(nlog2n)
 * 
 * 空间复杂度：O(n)
 * 
 * 稳定性：稳定
 */

namespace Xlcoffee\algorithm;

class HeapSort implements XlSortInterface
{ 
    /**
     * 执行
     */
    public function sort(array $array = [], string $sortingtype): array
    { 
        $len = count($array);
        $this->build_heap($array);
        while (--$len) {
            $val = $array[0];
            $array[0] = $array[$len];
            $array[$len] = $val;
            $this->heap_adjust($array, 0, $len);
        }
        return $array;
    }

    /**
     * 生成堆
     */
    public function build_heap(array &$array)
    {
        $len = count($array) - 1;
        for ($i = floor(($len - 1) / 2); $i >= 0; $i--) {
            $this->heap_adjust($array, $i, $len + 1);
        }
    }

    public function heap_adjust(array &$array, $i, $num)
    {
        if ($i > $num / 2) {
            return;
        }
        $key = $i;
        $leftChild = $i * 2 + 1;
        $rightChild = $i * 2 + 2;

        if ($leftChild < $num && $array[$leftChild] > $array[$key]) {
            $key = $leftChild;
        }
        if ($rightChild < $num && $array[$rightChild] > $array[$key]) {
            $key = $rightChild;
        }
        if ($key != $i) {
            $val = $array[$i];
            $array[$i] = $array[$key];
            $array[$key] = $val;
            $this->heap_adjust($array, $key, $num);
        }
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