<?php
/**
 * File Name: sub.php
 * Author: songyue
 * mail: songyue118@gmail.com
 * Created Time: 2019年09月18日 星期三 15时36分19秒
 */
$redis = new Redis();
$res = $redis->pconnect('docker-redis', 6379,0);
$redis->subscribe(array('test'), 'callback');

// 回调函数，这里编写处理逻辑
function callback($instance, $channelName, $message) {
    echo $channelName, "==>", $message, PHP_EOL;
}

