<?php
/**
 * Created by PhpStorm.
 * User: Jack Chen
 * Date: 2018/9/28
 * Time: 15:51
 */
$arr = [11,5,53,22,79,33,44];

function quick_sort($arr){
    // 1.判断参数是否是一个数组：
    if(!is_array($arr)){
        return false;
    }
    //2.递归出口：长度为1，直接返回数组
    $length = count($arr);
    if($length<=1){
        return $arr;
    }
    //3.数组元素有多个，定义两个空数组：
    $left = $right = [];
    //使用for循环进行遍历，把第一个元素当作比较对象
    for($i=1;$i<$length;$i++){
       //判断当前元素的大小
       if($arr[$i]<$arr[0]){
           $left[] = $arr[$i];
       }else{
           $right[] = $arr[$i];
       }
    }

    //4.递归调用
    $left = quick_sort($left);
    $right = quick_sort($right);

    return array_merge($left,array($arr[0]),$right);
}

//调用
echo "Input:[11,5,53,22,79,33,44]";
echo "Output:";
print_r(quick_sort($arr));


