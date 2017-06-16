<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/16
 * Time: 17:54
 */
//1.修改
/*
$var1 = 1;
$var2 = $var1;
$var1 = 2;
echo $var2 . "\n";  //1

//2.删除
$var1 = 1;
$var2 = $var1;
unset($var1);
echo $var2 . "\n"; //1*/


/*$GLOBALS就是当前变量本身，global相当于当前变量的引用*/
//修改
$var = 1;
function change(){
    global $var;                                                                                       ;
    $var = 2;
}
change();
echo $var . "\n";  //2

$var2 = 2;
function change2(){
    $GLOBALS['var2'] = 3;
}
change2();
echo $var2 . "\n"; //3
echo str_pad("",100,"#",STR_PAD_BOTH) . "\n";
//删除：
$var3 = 3;
function change3(){
    global $var3;
    unset($var3);
}
change3();
echo $var3 . "\n";  //3

$var4=4;
function change4(){
    unset($GLOBALS['var4']);
}
change4();
//echo $var4 . "\n";  //报错







