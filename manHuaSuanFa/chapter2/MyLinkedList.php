<?php
/**
 * File Name: manHuaSuanFa/chapter2/MyLinkedList.php
 * Author: songyue
 * mail: songyue118@gmail.com
 * Created Time: Mon 28 Oct 2019 01:41:05 AM CST
 */

class Node
{
    public $data;
    public $next;
    public function __construct($data = null, $next = null)
    {
        $this->data = $data;
        $this->next = $next;
    }
}

class MyLinkedList
{
    private $head;
    private $last; // 
    private $size;

    public function __construct()
    {
        $this->head = new Node();
        $this->last = new Node();
        $this->size = 0;
    }
    /**
     * 链表插入元素
     * @param data  插入元素
     * @param index 插入位置 
     */
    public function insert($data, $index) {
        if($index < 0 || $index > $this->size){
            throw new Exception("超出链表节点范围！");
        }
        $insertNode = new Node($data);
        if($this->size == 0){
            // 空链表
            $this->head = $insertNode;
            $this->last = $insertNode;
        }elseif($index = 0){
            //头部插入
            $insertNode->next = $this->head;
            $this->head = $insertNode;
        }elseif($index = $this->size){
            // 尾部插入
            $this->last->next = $insertNode;
            $this->last = $insertNode;
        }else{
            // 中间插入 
            $prevNode = $this->get(index-1);
            $insertNode->next = $prevNode->next;
            $prevNode->next = $insertNode;
        }
        $this->size++;
    }

    /**
     * 链表删除元素
     * @param index 删除的位置
     */
    public function remove($index) {
        
        if($index < 0 || $index > $this->size){
            throw new Exception("超出链表节点范围！");
        }
        if($index == 0){
        //删除头节点
            $removeNode = $this->head;
            $this->head = $this->head->next;
        }elseif($index == $this->size -1){
        //删除尾节点
            $prevNode = $this->get(index-1);
            $removeNode = $prevNode->next;
            $this->last = $this->prevNode;
        }else{
            //删除中间节点
            $prevNode = $this->get($index-1);
            $nextNode = $prevNode->next->next;
            $removeNode = $prevNode->next;
            $prevNode->next = $nextNode;
        }
        $this->size--;
        return $removeNode;
    }

    /**
     * 链表查找元素
     * @param index 查找的位置
     */
    public function get($index) {
        
        if($index < 0 || $index > $this->size){
            throw new Exception("超出链表节点范围！");
        }

        $temp = $this->head;
        for($i=0;$i<$index; $i++) {
            $temp = $temp->next;
        }
        return $temp;
    }

    /**
     * 输出链表
     */
    public function output() {
        $temp = $this->head;
        while($temp != null){
            printf("%s \n", $temp->data);
            $temp = $temp->next;
        }
    }

}

$myLinkedList = new MyLinkedList();
$myLinkedList->insert(3,0);
$myLinkedList->insert(7,1);
$myLinkedList->insert(9,2);
$myLinkedList->insert(5,3);
$myLinkedList->insert(6,1);
$myLinkedList->output();
$myLinkedList->remove(2);
echo ("删除index：2后的数组\n");
$myLinkedList->output();

