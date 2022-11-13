<?php
/**
 * File Name: anonymous.php
 * Author: songyue
 * mail: songyue118@gmail.com
 * Created Time: Mon May 17 16:06:04 2021
 */
/**
 * 匿名类
PHP 7 开始支持匿名类。 匿名类很有用，可以创建一次性的简单对象。
 *
 */
// PHP 7 之前代码
class Logger
{
    public function log($msg)
    {
        echo $msg;
    }
} 

//$util->setLogger(new Logger);

// PHP 7+ 后的代码
/**
$util->setLogger(new class {
    public function log($msg)
    {
        echo $msg;
    }
});
 */

// 可以传递参数到匿名类的构造器，也可以扩展（extend）其他类、实现接口（implement interface），以及像其他普通的类一样使用 trait：

class SomeClass {}
interface SomeInterface {}
trait SomeTrait {}

var_dump( new class(10) extends SomeClass implements SomeInterface {
    private $num;

    public function __construct($num)
    {
        $this->num = $num;
    }

    use SomeTrait;
});

/**
 *
 * 以上程序会输出
 object(class@anonymous)#1 (1) {
  ["num":"class@anonymous":private]=>
  int(10)
}
 */
