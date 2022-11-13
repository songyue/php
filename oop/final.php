<?php
/**
 * File Name: final.php
 * Author: songyue
 * mail: songyue118@gmail.com
 * Created Time: Mon May 17 16:36:44 2021
 */
/**
 * Final 关键字
PHP 5 新增了一个 final 关键字。如果父类中的方法被声明为 final，则子类无法覆盖该方法。如果一个类被声明为 final，则不能被继承。

示例 #1 Final 方法示例
 */
class BaseClass 
{
    public function test()
    {
        echo "BaseClass::test() called\n";
    }

    final public function moreTesting()
    {
        echo "BaseClass::moreTesting() called\n";
    }
}

class ChildClass extends BaseClass
{
    public function moreTesting()
    {
        echo "ChildClass::moreTesting() called\n";
    }
    // Results in Fatal error: Cannot override final method BaseClass::moreTesting()
}
