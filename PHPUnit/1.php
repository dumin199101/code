<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/16
 * Time: 11:19
 * Descripttion:PHP中的闭包:use语法的使用
 */

//1.使用global传递全局变量
/* $arr = 'text';
 $test = function(){
      global $arr;
      var_dump($arr); //text
      $arr = 'text2';
      var_dump($arr); //text2
 };
 $test();
 var_dump($arr); //text2*/

//2.通过参数的方式传递全局变量
/*$arr ='text';
$test = function($arr){
    var_dump($arr);  //text
    $arr = 'text2';
    var_dump($arr); //text2
};
$test($arr);
var_dump($arr); //text*/

//3.使用use语法传递全局变量
/*$arr = 'text';
$test = function() use($arr) {
    var_dump($arr);  //text
    $arr = 'text2';
    var_dump($arr); //text2
};
$test();
var_dump($arr);  //text*/

//4.闭包：内部函数中使用了函数外部定义的变量
//1)定义一个匿名函数调用
/*function callback($callback){
    $callback();
}
callback(function(){
    print "This is a anonymous function\n";
});*/

//2)定义一个匿名函数调用,并传递一个变量
/*function callback($callback){
    $callback();
}
$msg = "Hello everyone";
$callback = function() use($msg) {
    print "This is a closure use string value, msg is: $msg. <br />\n";
};
$msg = 'Hello World';
callback($callback);*/

//3)定义一个匿名函数调用,并传递一个变量的引用
/*function callback($callback){
    $callback();
}
$msg = "Hello Everyone";
$callback = function() use(&$msg) {
    print "This is a closure use string value lazy bind, msg is: $msg. <br />\n";
};
$msg = "Hello World";
callback($callback);*/

//







