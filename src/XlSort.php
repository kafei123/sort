<?php

/**
 * 公共排序
 */

namespace Xlcoffee;

class XlSort
{ 
    /**
     * 排序类容器
     */
    protected static $_sortContainers = [];

    /**
     * 获取具体类
     * 
     * @access public 
     * @param string    $ident 标识
     * @return class
     */
    public static function getObtain($ident = '')
    { 
        if (!self::$_sortContainers[$ident]) { 
            // 获取实例
            $class = XlSortConfig::$SORT_CLASS[$ident];

            if (!$class) { 
                return false;
            }
    
            self::$_sortContainers[$ident] = new $class;
        }

        return self::$_sortContainers[$ident];
    }

    /**
     * 入口
     * 
     * @access public 
     * @param array     $array  排序数组
     * @param bool      $sortingtype 排列规则，默认 asc 正序，desc 倒叙
     * @param string    $ident   排序算法，默认 quick 快速排序，bubble 冒泡排序，insert 插入排序，select 选择排序
     * @return array
     */
    public static function invoking(array $array = [], string $sortingtype = 'asc', string $ident = 'quick'): array
    { 
        if (!$class = self::getObtain($ident)) { 
            // 该标识不存在
            return [];
        }

        return $class->sort($array, $sortingtype);
    }
}