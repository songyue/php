<?php

/**
 * File Name: construct.php
 * Author: songyue
 * mail: songyue118@gmail.com
 * Created Time: Mon May 17 14:32:46 2021
 */
class A
{
    public function __construct($a = 'string')
    {
        print_r($a);
    }
}

$a = new A();
