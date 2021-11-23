<?php
/**
 * 力扣题库代码
 * File Name: sum.php
 * Author: songyue
 * mail: songyue118@gmail.com
 * Created Time: Thu Oct 14 14:17:45 2021
 */


class Solution {

    /**
     * 给定一组数字,找出该数组中和为目标值的两个数字
     * 题目地址 https://leetcode-cn.com/problems/two-sum/
     *
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum(array $nums, int $target)
    {
        $len = count($nums);
        $ret = [];
        for($i=0; $i<$len-1; $i++){
            for($j=$i+1; $j<$len; $j++){
                if($nums[$i]+$nums[$j] == $target){
                    $ret[$nums[$i]] = [$nums[$i], $nums[$j]];
                }
            }
        }
        print_r(array_values($ret));
    }

    function twoSum1(array $nums, int $target)
    {
        if(count($nums) == 0) {
            return [];
        }
        $ret = [];
        for ($i = 0; $i< count($nums); $i++) {
            $temp = $target - $nums[$i];
            if(isset($ret[$temp])) {
                return [$ret[$temp],$i];
            }
            $ret[$nums[$i]] = $i;
        }
        return [];
    }

    function twoSum2($nums, $target)
    {
        foreach($nums as $k => $v) {
            $temp = $target - $v;
            if(in_array($temp, $nums)) {
                $i = array_search($temp, $nums);
                if($k != $i) {
                    return [$k, $i];
                }
            }
        }
        return [];
    }
}

$solution = new Solution() ;

$nums = [2,7,11,15];
$target = 9;
$solution->twoSum($nums, $target);
$ret = $solution->twoSum1($nums, $target);
print_r($ret);
$ret = $solution->twoSum2($nums, $target);
print_r($ret);
