<?php
/**
 * 接口类
 */

namespace Xlcoffee\algorithm;

interface XlSortInterface
{ 
    /**
     * 排序
     */
    public function sort(array $array, string $sortingtype): array;
}

