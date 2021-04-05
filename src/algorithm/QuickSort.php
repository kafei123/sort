<?php

/**
 * 快速排序
 * 
 * 时间复杂度：平均情况：O(nlog2n)， 最好情况：O(nlog2n)， 最坏情况：O(nlog2n)
 * 
 * 空间复杂度：O(n)
 * 
 * 稳定性：不稳定
 */

namespace Xlcoffee\algorithm;

use Xlcoffee\XlSortConfig;
use Exception;

class QuickSort implements XlSortInterface
{ 
    /**
     * 执行
     */
    public function sort(array $array = [], string $sortingtype): array
    { 
        $len = count($array);

        if($len <= 1) {
            return $array;
        }
    
        //选择第一个元素作为基准
        $base_num = $array[0];
    
        if ($sortingtype == XlSortConfig::SORT_DESC) { 
            $result = $this->sortDesc($array, $len, $base_num);
        } else { 
            $result = $this->sortAsc($array, $len, $base_num);
        }
    
        //再分别对左边和右边的数组进行相同的排序处理方式递归调用这个函数
        $left_array = $this->sort($result['left_array'], $sortingtype);
        $right_array = $this->sort($result['right_array'], $sortingtype);
        //合并
        return array_merge($left_array, array($base_num), $right_array);
    }

    /**
     * 倒序
     * 
     * @param array $array 排序的数组
     * @return array
     */
    public function sortDesc (array $array, int $len, int $base_num): array
    { 
        $left_array = [];
        $right_array = [];

        for ($i = 1; $i < $len; $i++) { 
            if($base_num < $array[$i]) {
                //放入左边数组
                $left_array[] = $array[$i];
            } else {
                //放入右边
                $right_array[] = $array[$i];
            }
        }
    
        return [
            'left_array' => $left_array,
            'right_array' => $right_array,
        ];
    }

    /**
     * 正序
     * 
     * @param array $array 排序的数组
     * @return array
     */
    public function sortAsc (array $array, int $len, int $base_num): array
    { 
        $left_array = [];
        $right_array = [];

        for ($i = 1; $i < $len; $i++) { 
            if($base_num > $array[$i]) {
                //放入左边数组
                $left_array[] = $array[$i];
            } else {
                //放入右边
                $right_array[] = $array[$i];
            }
        }
    
        return [
            'left_array' => $left_array,
            'right_array' => $right_array,
        ];
    }
}