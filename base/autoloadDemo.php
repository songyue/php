<?php
/**
 * File Name: autoloadDemo.php
 * Author: songyue
 * mail: songyue118@gmail.com
 * Created Time: 三  6/19 01:08:54 2019
 */

spl_autoload_register(function($className){
    echo "所有包含文件的工作都交给我\r\n";
    $classFileName = "./{$className}.php";
    echo "我来包含！{$classFileName}.php\r\n";
    include "./{$className}.php"; 
});

$objDemo = new AutoloadClass();
$objDemo->run();

/**
 * :r !php autoloadDemo.php
 *
所有包含文件的工作都交给我
我来包含！./AutoloadClass.php.php
你已经包含我了
 */
