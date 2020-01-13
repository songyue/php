<?php
/**
 * File Name: tojson.php
 * Author: songyue
 * mail: songyue118@gmail.com
 * Created Time: 2020年01月13日 星期一 16时21分57秒
 */

/**
 * json字符串格式化输出方法，对中文禁用unicode编码
 * 使用方式
 * curl xxx | php tojson.php
 * linux 别名
 * alias tojson='$(which php) ~/.local/bin/tojson.php'
 */
$fh = fopen('php://stdin','r');
//echo fgets($fh);
//fclose($fh);
//exit;
// $raw =file_get_contents("php://input");
//print_r($raw); exit;
//print_r($argv); exit;
//$json_str = $argv[1];

$json_str = fgets($fh);
$json_obj = json_decode($json_str);
$json_str = json_encode($json_obj, JSON_UNESCAPED_UNICODE);
$json_str = json_encode($json_obj, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
echo $json_str;

fclose($fh);
