<?php
/**
 * File Name: lengthOfLongestSubstring.php
 * Author: songyue
 * mail: songyue118@gmail.com
 * Created Time: Tue Oct 19 14:24:13 2021
 */

class Solution {

    /**
     * 无重复字符的最长子串
     *
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s) {

        // 记录每个字符串是否出现过
        //$occ = [];
        $n = strlen($s);
        //// 定义一个右指针,初始值为 -1
        $rightPointer = -1;
        $ret = 0; // 返回值

        // 子串
        $subStr = [];
        // 遍历字符串数组
        for ($i = 0; $i < $n; $i++) {

            // 更新子串
           $subStr = substr($s, $i, $i+$rightPointer+1);
           $rightPointer++;
            print_r(['a' => $subStr]);
            // $i 到 
        }
        return $ret;
    }
}

$s = 'abcabcbb';
print_r((new Solution())->lengthOfLongestSubstring($s));
