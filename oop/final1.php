<?php
/**
 * File Name: final1.php
 * Author: songyue
 * mail: songyue118@gmail.com
 * Created Time: Mon May 17 16:41:11 2021
 */
final class BaseClass
{
    public function test()
    {
        echo  "BaseClass::test() called\n";
    }
}

class ChildClass extends BaseClass
{
}

// 注意: 属性不能被定义为 final，只有类和方法才能被定义为 final。
//
//  Fatal error: Class ChildClass may not inherit from final class (BaseClass) in final1.php on line 18 Errors parsing final1.php
