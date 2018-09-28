<?php
/**
 * Created by PhpStorm.
 * User: Jack Chen
 * Date: 2018/9/28
 * Time: 15:39
 * PHP单例模式
 */

class Single{

    private static $obj = null;

    private function __construct()
    {

    }

    private function __clone(){

    }

    public static function getObj(){
        if(self::$obj === null){
            self::$obj = new Single();
        }
        return self::$obj;
    }


}


$a = Single::getObj();
$b = Single::getObj();
/*判断两个类是否为同一个类*/
echo $a===$b ? 1 : 0;
