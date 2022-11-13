<?php
/**
 * File Name: interface-abstract.php
 * Author: songyue
 * mail: songyue118@gmail.com
 * Created Time: Mon May 17 15:41:29 2021
 */
/**
 * 示例 #5 抽象（abstract）类的接口使用
 */
interface A
{
    public function foo(string $s): string;
    public function bar(int $i): int;
}

// 抽象类可能仅实现接口的一部分.
// 扩展该抽象类时必须实现剩余部分.
abstract class B implements A
{
    public function foo(string $f): string
    {
        return $f . PHP_EOF;
    }

}


class C extends B
{
    public function bar(int $b): int
    {
        return $i * 2;
    }
}


