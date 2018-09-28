<?php
/**
 * Created by PhpStorm.
 * User: Jack Chen
 * Date: 2018/9/28
 * Time: 15:20
 * 实现双向队列
 */


class Deque{
    private $queue = [];

    public function addFirst($item){
        return array_unshift($this->queue,$item);
    }

    public function addLast($item){
        return array_push($this->queue,$item);
    }

    public function removeFirst(){
        return array_shift($this->queue);
    }

    public function removeLast(){
        return array_pop($this->queue);
    }
}