<?php
/**
 * File Name: dna.php
 * Author: songyue
 * mail: songyue118@gmail.com
 * Created Time: Wed Oct 13 17:45:51 2021
 */
class Solution {

    /**
     * @param String $s
     * @return String[]
     */
    function findRepeatedDnaSequences($s) {
        // 子串长度为10,每次取10个字符
        $len = 10;
        $arr = [];
        $strs = [];
        for($i=0; $i <= strlen($s)-$len; $i++) {
            $val = substr($s, $i, $len);
            if(array_key_exists($val, $arr)){
                $arr[$val]++;
                $strs[$val] = $arr[$val]; 
            }else{
                $arr[$val] = 1;
            }
        }
        return array_keys($strs);
    }

    function findRepeatedDnaSequences2($s)
    {
        $len = strlen($s);
        if($len < 10) {
            return [];
        }
        $left = 0;
        $right = 9;
        $map = [];
        $ans = [];

        while($right < $len){
            $key = substr($s, $left, 10);
            $map[$key] = isset($map[$key]) ? $map[$key]+1 : 1;
            if($map[$key] == 2) $ans[] = $key;
            $left++;
            $right++;
        }
        return $ans;
    }
}

$s = "AAAAACCCCCAAAAACCCCCCAAAAAGGGTTT";
$s = "AAAAAAAAAAA";
//$res = (new Solution())->findRepeatedDnaSequences($s);
$res = (new Solution())->findRepeatedDnaSequences2($s);
print_r($res);


