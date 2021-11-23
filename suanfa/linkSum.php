<?php
/**
 * File Name: linkSum.php
 * Author: songyue
 * mail: songyue118@gmail.com
 * Created Time: Fri Oct 15 15:10:21 2021
 */
/**
 * Definition for a singly-linked list.
 */
 class ListNode {
     public $val = 0;
     public $next = null;
     function __construct($val = 0, $next = null) {
         $this->val = $val;
         $this->next = $next;
     }
 }
class Solution {

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2) {

        $head = null;
        $carry = 0;
        while($l1 != null || $l2 != null ) {

            $l1val = $l1 != null ? $l1->val : 0;
            $l2val = $l2 != null ? $l2->val : 0;
            $sumVal = $l1val + $l2val + $carry;

            if(!$head){
                $head = new ListNode($sumVal % 10);
                $tmp = $head;
            }else{
                $tmp->next = new ListNode($sumVal % 10);
                $tmp = $tmp->next;
            }

            $carry = $sumVal > 9 ? 1 : 0;
            if($carry > 0) {
                $tmp->next = new ListNode($carry);
            }
            if($l1 != null) $l1 = $l1->next;
            if($l2 != null) $l2 = $l2->next;

        }
        return $head;
    }
}

//$l1 = new Solution();
//foreach([2,4,3] as $val) {
//    $tmp = $l1;
//    $tmp->next = new Solution($val);
//    $l1->next = $tmp;
//}
// [5,6,4])
$l1 = new ListNode(2);
$l1->next = new ListNode(4, new ListNode(3));

$l2 = new ListNode(5);
$l2->next = new ListNode(6, new ListNode(9));

$ret = (new Solution())->addTwoNumbers($l1, $l2);

while($ret != null) {

    $tmp = $ret;
    print_r(['val' => $tmp->val]);
    $ret = $tmp->next;
}
