<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/14
 * Time: 17:27
 */
class Common_Function{
    /*生成随机字符串*/
    public static function randStr($length=5){
        $arr = array_merge(range(0,9),range('a','z'),range('A','Z'));
        shuffle($arr);
        return implode('',array_slice($arr,0,$length));
    }
    /*生成signature*/
    public static function token($timestamp,$nonce){
        $token = 'qwertyuiopmnbvcxzasdfghjkl1234567890@#$%^&*';
        $tmpArr = [$token,$timestamp,$nonce];
        $tmpStr = sha1(implode($tmpArr));
        return $tmpStr;
    }
    /*模拟生成请求url*/
    public static function getUrl(){
        $url = 'http://192.168.91.128/PhalApi/Public/myapp2/?service=Book.GetBookList';
        $nonce = Common_Function::randStr();
        $timestamp = time();
        $params = [
            'signature'=> Common_Function::token($timestamp,$nonce),
            'time'=>$timestamp,
            'nonce'=>$nonce
        ];
        $query_str = http_build_query($params);
        return $url . '&' . $query_str;
    }
}