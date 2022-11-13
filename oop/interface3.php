<?php
/**
 * File Name: interface3.php
 * Author: songyue
 * mail: songyue118@gmail.com
 * Created Time: Mon May 17 15:36:51 2021
 */
/**
 * 示例 #3 扩展多个接口
 */
interface A
{
    public function foo();
}

interface B
{
    public function bar();
}

interface C extends A, B
{
    public function baz();
}

class D implements C
{
    public function foo()
    {
    }

    public function bar()
    {
    }

    public function baz()
    {
    }
} 

