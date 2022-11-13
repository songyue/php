<?php
/**
 * File Name: abstract.php
 * Author: songyue
 * mail: songyue118@gmail.com
 * Created Time: Mon May 17 15:02:36 2021
 */
abstract class AbstractClass
{
    // 强制要求子类定义这些方法
    abstract protected function getValue();
    abstract protected function prefixValue($prefix);

    // 普通方法(非抽象方法)
    public function printOut()
    {
        print $this->getValue() . "\n";
    }
}

class ConcreateClass1 extends AbstractClass
{
    protected function getValue()
    {
        return "ConcreateClass1";
    }

    public function prefixValue($prefix)
    {
        return "{$prefix}ConcreateClass1";
    }
}

class ConcreateClass2 extends AbstractClass
{
    protected function getValue()
    {
        return "ConcreateClass2";
    }

    public function prefixValue($prefix)
    {
        return "{$prefix}ConcreateClass2";
    }
}

$class1 = new ConcreateClass1;
$class1->printOut();
echo $class1->prefixValue('Foo_')."\n";

$class2 = new ConcreateClass2;
$class2->printOut();
echo $class2->prefixValue('Foo_')."\n";

