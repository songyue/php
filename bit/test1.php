<?php
/**
 * File Name: test1.php
 * Author: songyue
 * mail: songyue118@gmail.com
 * Created Time: 2020年11月22日 星期日 00时24分32秒
 * 2的幂运算
 */

/**
 * 判断一个数字是否为2的幂
 */
class test1 {

    /**
     * @param int $n 
     */
    public static function bitMethod(int $n)
    {
        if($n == 0) {
            return false; 
        }

        // 2的幂数 | 2的幂数-1
        // 2   10  | 1   1
        // 4  100  | 3  11  
        // 8 1000  | 7 111
        return (($n & ($n-1)) == 0);
    }
}


$begin_num = 0;
$end_num = 2048;
$last_status = false;
for($i=$begin_num;$i<=$end_num;$i++){

    // 是否为2的幂数
    $is_true = test1::bitMethod($i);
    // 状态变更
    if($last_status !=$is_true){
        // 如果是2的幂数,则输出
        if($is_true == true){
            $i > $begin_num && printf("%d-%d 不是2的幂\n", $begin_num, $i-1);
            printf("%d 是2的幂\n", $i);
        }
        // 则记录当前值,下次状态变更时输出
        $begin_num = $i;
        // 同步标记状态
        $last_status = $is_true;
    }else{
        // 1和2两个连续的数字都为2的幂数，属于连续的未变更状态输出
        if($is_true == true){
            printf("%d 是2的幂\n", $i);
        }
    }
}
// 如果最后一个数字不是2的幂，则输出
$is_true || printf("%d-%d 不是2的幂\n", $begin_num, $i-1); 
