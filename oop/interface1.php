<?php
/**
 * File Name: interface1.php
 * Author: songyue
 * mail: songyue118@gmail.com
 * Created Time: Mon May 17 15:19:18 2021
 */

// 声明一个‘template’接口
interface Template
{
    public function setVariable($name, $var);
    public function getHtml($template);
}

// 实现接口
// 正确的写法
class WorkIngTemplate implements Template
{
    private $vars = [];

    public function setVariable($name, $var)
    {
        $this->vars[$name] = $var;
    }

    public function getHtml($template)
    {
        foreach($this->vars as $name=>$var) {
            $template = str_replace('{'. $name .'}', $var, $template);

        }
        return $template;
    }
}

