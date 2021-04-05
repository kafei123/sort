<?php

/**
 * 钱包表
 */

namespace Xlcoffee;

class XlSortConfig
{ 
    /**
     * 钱包类
     */
    public static $SORT_CLASS = [
        'bubble' => "\\Xlcoffee\\algorithm\\BubbleSort",
        'insert' => "\\Xlcoffee\\algorithm\\InsertSort",
        'quick' => "\\Xlcoffee\\algorithm\\QuickSort",
        'select' => "\\Xlcoffee\\algorithm\\SelectSort",
        'merge' => "\\Xlcoffee\\algorithm\\MergeSort",
        'heap' => "\\Xlcoffee\\algorithm\\HeapSort",
        'shell' => "\\Xlcoffee\\algorithm\\ShellSort",
        'radix' => "\\Xlcoffee\\algorithm\\RadixSort",
    ];

    /**
     * 正序
     */
    const SORT_ASC = 'asc';

    /**
     * 倒序
     */
    const SORT_DESC = 'desc';
}