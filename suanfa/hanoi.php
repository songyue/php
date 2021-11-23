<?php

/**
 * File Name: hanoi.php
 * Author: songyue
 * mail: songyue118@gmail.com
 * Created Time: Sat Oct  9 18:00:24 2021
 */

function hanoi($num, $source, $target, $auxliliary)
{
    static $i = 0;
    if ($num == 1) {
        // 柱子只有一个圆盘
        printf("第%d次: 从 %s 移动到 %s \n", $num, $source, $target);
        $i++;
    } else {
        // n - 1 的盘子 从起始柱移动到辅助柱,
        hanoi($num - 1, $source, $auxliliary, $target);
        printf("第%d次: 从 %s 移动到 %s \n", $num, $source, $target);
        $i++;
        // n -1 的盘子 从辅助柱移动到目标柱
        hanoi($num - 1, $auxliliary, $target, $source);
    }
}

hanoi(4, '起始柱', '目标柱', '辅助柱');
