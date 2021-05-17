<?php
/**
 * File Name: interface2.php
 * Author: songyue
 * mail: songyue118@gmail.com
 * Created Time: Mon May 17 15:28:04 2021
 */
/**
 * 示例 #2 可扩充的接口
 */
interface A
{
    public function foo();
}

interface B extends A
{
    public function bar(Baz $baz);
}

class C implements B
{
    public function foo()
    {
    }

    public function baz(Baz $baz)
    {
    }
} 

// 错误写法会导致一个致命错误
class D implements B 
{
    public function foo()
    {
    }

    public function baz(Foo $foo)
    {
    }
}
