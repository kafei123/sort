# 排序算法集合

## 环境要求
- PHP >= 5.4
- 
## 安装
```
$ composer require xlcoffee/sort -vvv
```

## 算法种类

- bubble：  冒泡排序    - 支持正序/倒序
- insert：  插入排序    - 支持正序/倒序
- quick：   快速排序    - 支持正序/倒序
- select：  选择排序    - 支持正序/倒序
- merge：   归并排序    - 支持正序/倒序
- heap：    堆排序      - 支持正序/倒序
- shell：   希尔排序
- radix：   基数排序



## 使用
```
<?php

use Xlcoffee\XlSort;

require_once '../vendor/autoload.php';

$array = [10,3,2,4,98,23];

// 排序数组，排序规则，排序算法
$sort = XlSort::invoking($array， 'asc', 'bubble');

var_dump($sort);
```

## License
[MIT](https://github.com/kafei123/sort/master/README.md)
