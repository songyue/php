<?php
/**
 * File Name: study1.php
 * Author: songyue
 * mail: songyue118@gmail.com
 * Created Time: Sat Oct 26 13:12:59 2019
 */

// 查找一组整数数组中重复的数字
function find($arr)
{
    $map = [];
    for($i=0;$i<count($arr); $i++)
    {
        if(isset($map[$arr[$i]]))
        {
            $map[$arr[$i]]++;
        }else{
            $map[$arr[$i]] = 1;
        }
    }
    return $map;
}

//$arr = [3,1,2,5,4,9,7,2,2, 9];
$arr = [3,1,2,5,4,9,7,2,2, 9];
$res = find($arr);
print_r($res);
