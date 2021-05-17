<?php
/**
 * File Name: interface-extends.php
 * Author: songyue
 * mail: songyue118@gmail.com
 * Created Time: Mon May 17 15:46:04 2021
 */
/**
 * 示例 #6 同时使用扩展和实现
 */
class One
{
}

interface Usable
{
}

interface Updatable
{
}

// 关键词顺序至关重要: 'extends' 必须在前面
class Two extends One implements Usable, Updatable
{

}

//  接口加上类型约束，提供了一种很好的方式来确保某个对象包含有某些方法。参见 instanceof 操作符和类型声明。
