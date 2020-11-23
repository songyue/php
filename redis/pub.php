<?php
/**
 * File Name: pub.php
 * Author: songyue
 * mail: songyue118@gmail.com
 * Created Time: 2019年09月18日 星期三 15时39分53秒
*/
$redis = new Redis();
$res = $redis->connect('docker-redis', 6379,0);
// test 为发布的频道名称， hello，world为发布的内容
$res = $redis->publish('test', 'hello,world');
