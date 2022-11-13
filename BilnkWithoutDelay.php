<?php
/**
 * File Name: BilnkWithoutDelay.php
 * Author: songyue
 * mail: songyue118@gmail.com
 * Created Time: 2020年11月23日 星期一 17时34分14秒
 *
 */
const LOW = 0;
const HIGH = 1;

$ledState = LOW;

$previousMillis = 0; // 前一个毫秒
$interval = 2000; // 时间间隔
$ledPin = 13; // led针脚
while(true){
    $currentMillis = msectime();
    if($currentMillis - $previousMillis >= $interval) {
        $previousMillis = $currentMillis;
        if($ledState == LOW){
            $ledState = HIGH;
        }else{
            $ledState = LOW;
        }
        // 调用开关方法
        switch_led($ledPin, $ledState);
    }

    sleep(1);
}

// 模拟打印开关状态
function switch_led($pin, $state){
    printf("开关 %s 的状态 %s \n", $pin, $state);
}

// 获取毫秒时间戳
function msectime()
{
    [$msec, $sec] = explode(' ', microtime());
    return sprintf('%.0f', ($sec + $msec) * 1000);
}
