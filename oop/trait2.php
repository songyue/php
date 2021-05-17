<?php
/**
 * File Name: trait2.php
 * Author: songyue
 * mail: songyue118@gmail.com
 * Created Time: Mon May 17 15:55:57 2021
 */
/**
 * 修改方法的访问控制
使用 as 语法还可以用来调整方法的访问控制。

示例 #6 修改方法的访问控制
 */
trait HelloWorld 
{
    public function sayHello()
    {
        echo "Hello World!";
    }
}

// 修改 sayHello 的访问控制
class MyClass1
{
    use HelloWorld { sayHello as protected; }
}

// 给方法一个改变访问控制的别名
// 原版 sayHello 的访问控制则没有发生变化
class MyClass2 
{
    use HelloWorld { sayHello as private myPrivateHello; }
}
