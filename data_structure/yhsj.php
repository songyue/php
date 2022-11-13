<?php
/**
 * File Name: yhsj.php
 * Author: songyue
 * mail: songyue118@gmail.com
 * Created Time: Mon 28 Oct 2019 09:35:29 PM CST
 */

/**
 * 杨辉三角
 * @param $n int 层数
 */
function get($n) {
    $arr = array();
    // 循环层级
    for($i=1;$i<=$n; $i++){
        // 每层输出内容
        for($j=1; $j<=$i; $j++){
            // 如果是行第一个位置，或者最后一个位置，直接输出
            if($j ==1 || $j == $i){
                echo $arr[$i][$j]=1;
            }else{
                // 拼接输出中间的数字，
                // 1行1列；
                // 2行1列，2行2列
                // 3行1列，3行2列，3行3列
                echo $arr[$i][$j] = $arr[$i-1][$j-1] + $arr[$i-1][$j];
            }
            echo "\t";
        }
        echo PHP_EOL;
    }
}

get(10);
