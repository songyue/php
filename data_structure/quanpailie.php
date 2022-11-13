<?php
/**
 * File Name: quanpailie.php
 * Author: songyue
 * mail: songyue118@gmail.com
 * Created Time: Sun 03 Nov 2019 01:24:17 AM CST
 */

// 计算123的全排列
for($a=1; $a<=4; $a++){
    for($b=1; $b<=4; $b++){
        for($c=1; $c<=4; $c++){
            for($d=1; $d<=4; $d++){
                if($a !=$b && $a!= $c && $a !=$d
                    && $b !=$c && $b !=$d
                    && $c !=$d 
                ){
                    echo $a.$b.$c.$d.PHP_EOL;
                }
            }
        }
    }
}
