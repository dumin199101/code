<?php
/**
 * Created by PhpStorm.
 * User: Jack Chen
 * Date: 2018/9/28
 * Time: 16:13
 */

$arr = [11,5,53,22,79,33,44];

$length = count($arr);

$left = $right = [];

for($i=1;$i<$length;$i++){
    //判断当前元素的大小
    if($arr[$i]<$arr[0]){
        $left[] = $arr[$i];
    }else{
        $right[] = $arr[$i];
    }
}


print_r($left);
print_r($right);

