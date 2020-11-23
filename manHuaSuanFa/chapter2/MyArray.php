<?php
/**
 * File Name: php/chapter2/MyArray.php
 * Author: songyue
 * mail: songyue118@gmail.com
 * Created Time: Sun 27 Oct 2019 11:00:35 PM CST
 */

class MyArray
{
    private $_array;
    private $_size;
    private $_capacity; // 通过声明一个capacity属性来模拟约束数组空间的长度
    public function MyArray(int $capacity) // throw Exception
    {
        // php里的数组是hash表，没有真正意义上的数组，只是借用了array这个名称,使用array_fill模拟创建
        $this->_array = array_fill(0, $capacity, 'null');
        $this->_capacity = count($this->_array);
        $this->_size = 0; 
    }

    /**
     * 数组插入元素
     * @param $element  插入元素
     * @param $index    插入的位置
     */
    public function insert(int $element, int $index)
    {
        // 判断访问下标是否超出范围
        if($index < 0 || $index > $this->_size)
        {
            throw new \Exception("超出数组实际元素范围！");
        }

        // 如果实际元素达到数组容量上限，则对数组进行扩容
        if($this->_size >= $this->_capacity)
        {
            $this->resize();
        }
        // 模拟限制数组空间长度
        if($this->_size >= $this->_capacity)
        {
            throw new \Exception("Index $index out of bounds for length $this->_capacity");
        }
        // 从右向坐循环，将元素逐个向右挪1位
        for($i=$this->_size-1; $i>=$index; $i--)
        {
            $this->_array[$i+1] = $this->_array[$i];
        }
        // 腾出的位置放入新元素
        $this->_array[$index] = $element;
        $this->_size++;
    }

    /**
     * 数组删除操作
     * @param $index 删除的位置
     */
    public function delete($index)
    {
        // 判断访问下标是否超出范围
        if($index < 0 || $index > $this->_size)
        {
            throw new \Exception("超出数组实际元素范围！");
        }
        $deleteElement = $this->_array[$index];
        // 从左向右循环，将元素逐个向左挪1位
        for ($i=$index; $i<$this->_size-1; $i++)
        {
            $this->_array[$i] = $this->_array[$i+1];
        }
        $this->_size--;
        return $deleteElement;

    }
    /**
     * 数组扩容
     */
    private function resize()
    {
        // 新数组长度为原数组的2倍
        $this->_capacity = count($this->_array)*2;
        $arrayNew = array_fill(0, $this->_capacity, 'null');
        // 从旧数组复制到新数组
        $arrayNew = $this->_array;
        $this->_array = $arrayNew;
    }


    /**
     * 输出数组
     */
    public function output()
    {
        for($i=0; $i<$this->_size;$i++)
        {
            printf("%s \n", $this->_array[$i]);
        }
    }

}

$myArray = new MyArray(4);
$myArray->insert(3,0);
$myArray->insert(7,1);
$myArray->insert(9,2);
$myArray->insert(5,3);
$myArray->insert(6,1);
$myArray->output();
$myArray->delete(2);
echo "删除index：2后的数组".PHP_EOL;
$myArray->output();
