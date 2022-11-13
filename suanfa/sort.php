<?php
/**
 * File Name: sort.php
 * Author: songyue
 * mail: songyue118@gmail.com
 * Created Time: Mon Oct 11 15:58:04 2021
 */


$arr = [
    '8-513',
    '7-0',
    '8-511',
    '7-1',
    '8-512',
    '84-38',
    '8-438',
    '84-138',
    '84-2',
    '84-43'
];
print_r(['原始数据' => $arr]);

$new_arr = [];

foreach($arr as $str) 
{
//    $first = substr($str, 0, strpos($str, '-'));
//    $last = str_replace($first.'-', '', $str);

    list($first, $last) = explode('-', $str);
    // 根据最后字符串的长度 计算出 首位的排序
    $key = ($first * strlen($last) * 10) + $last;

    print_r([
        '$first' =>  $first,
        '$last' =>  $last,
        '$key' =>  $key
   ]);


    $new_arr[$key] = $str;
}
//exit;

print_r(['格式化数据' => $new_arr]);
ksort($new_arr);
print_r(['排序后数据'=> array_values($new_arr)]);
