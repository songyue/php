<?php
/**
 * File Name: api/test.php
 * Author: songyue
 * mail: songyue118@gmail.com
 * Created Time: Tue Nov 23 22:30:21 2021
 */
class Test{
    public function action1()
    {
        return  "无参数action";
    }

    public function action2($params)
    {
        return $params;
    }
}
