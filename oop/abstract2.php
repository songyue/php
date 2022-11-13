<?php
/**
 * File Name: abstract2.php
 * Author: songyue
 * mail: songyue118@gmail.com
 * Created Time: Mon May 17 15:10:37 2021
 */
abstract class AbstractClass
{
    // 我们的抽象方法仅需要定义需要的参数
    abstract protected function prefixName($name);
}

class ConcreateClass extends AbstractClass
{
    // 我们的子类可以定义父类签名中不存在的可选参数
    public function prefixName($name, $separator = '.')
    {
        if($name == 'Pacman') {
            $prefix = 'Mr';
        } elseif($name == 'Pacwoman') {
            $prefix = 'Mrs';
        } else {
            $prefix = "";
        }

        return "{$prefix}{$separator} {$name}";
    }
}

$class = new ConcreateClass();
echo $class->prefixName('Pacman'), "\n";
echo $class->prefixName('Pacwoman'), "\n";

