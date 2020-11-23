<?php
/**
 * File Name: callback2closure.php
 * Author: songyue
 * mail: songyue118@gmail.com
 * Created Time: 2019年08月27日 星期二 17时33分40秒
 */

// callback 转闭包
class Test
{
    public function exposeFunction()
    {
        return Closure::fromCallable([$this, 'privateFuntion']);
    }

    private function privateFuntion($param)
    {
        var_dump($param);
    }
}

$privFunc = (new Test)->exposeFunction();
$privFunc(111);

