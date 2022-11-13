<?php
/**
 * File Name: arrow.php
 * Author: songyue
 * mail: songyue118@gmail.com
 * Created Time: Mon 17 May 2021 05:57:10 PM CST
 */
$y = 1;

$fn1 = fn($x) => $x + $y;

// 相当于 using $y by value
fn2 = function($x) use ($y) {
    return $x + $y;
}

var_export($fn1(3));
