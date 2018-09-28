<?php
/**
 * Created by PhpStorm.
 * User: Jack Chen
 * Date: 2018/9/28
 * Time: 15:29
 */
class Obj{

    public $a;

    public function __construct($a)
    {
        $this->a = $a;
    }

    public function b(){
        echo 'Hello World';
    }
}

$obj = new Obj("Hi");

var_dump($obj->a);
$obj->b();