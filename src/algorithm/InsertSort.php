<?php

/**
 * 插入排序
 * 
 * 时间复杂度：平均情况：O(n^2)， 最好情况：O(n)， 最坏情况：O(n^2)
 * 
 * 空间复杂度：O(l)
 * 
 * 稳定性：稳定
 */

namespace Xlcoffee\algorithm;

use Xlcoffee\XlSortConfig;

class InsertSort implements XlSortInterface
{ 
    /**
     * 执行
     * 
     * @param array $array 排序的数组
     * @param string $sortingtype 排序规则
     * @return array
     */
    public function sort(array $array = [], string $sortingtype): array
    { 
        // 获取数组长度
        if ($sortingtype == XlSortConfig::SORT_DESC) { 
            return $this->sortDesc($array);
        }

        return $this->sortAsc($array);
    }

    /**
     * 倒序
     * 
     * @param array $array 排序的数组
     * @return array
     */
    public function sortDesc (array $array): array
    { 
        $len = count($array);
    
        for ($i = 1; $i < $len; $i++) { 
            $tem = $array[$i];
            for ($j = $i - 1; $j >= 0; $j--) { 
                if ($tem > $array[$j]) { 
                    $array[$j + 1] = $array[$j];
                    $array[$j] = $tem; 
                } else { 
                    break;
                }
            }
        }
    
        return $array;
    }

    /**
     * 正序
     * 
     * @param array $array 排序的数组
     * @return array
     */
    public function sortAsc (array $array): array
    { 
        $len = count($array);
    
        for ($i = 1; $i < $len; $i++) { 
            $tem = $array[$i];
            for ($j = $i - 1; $j >= 0; $j--) { 
                if ($tem < $array[$j]) { 
                    $array[$j + 1] = $array[$j];
                    $array[$j] = $tem; 
                } else { 
                    break;
                }
            }
        }
    
        return $array;
    }
}