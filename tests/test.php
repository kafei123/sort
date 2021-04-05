<?php

use Xlcoffee\XlSort;

require_once '../vendor/autoload.php';

$array = [10,3,2,4,98,23];

$sort = XlSort::invoking($array);

var_dump($sort);
