<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/9
 * Time: 15:29
 * Description: PHP 的类型约束：
 *              PHP5开始可以使用类型约束，但是类型约束仅限于数组(PHP5.1)，对象，接口，callable（PHP5.4）类型，标量类型如string,int,float,boolean不能用于类型约束，包括traits
 */
class MyClass{

    /**
     * 测试对象
     * 第一个参数必须为OtherClass类的实例
     * @param OtherClass $otherclass
     */
    public function testObj(OtherClass $otherclass){
        echo $otherclass->var;
    }

    public function testArray(array $arr)
    {
        print_r($arr);
    }

    public function testCallable(callable $callable,$data)
    {
        call_user_func_array($callable,$data);
    }
}

class OtherClass{
    public $var = "other var";
}

// 两个类的对象
$myclass = new MyClass;
$otherclass = new OtherClass;

// 致命错误：第一个参数必须是 OtherClass 类的一个对象
//$myclass->testObj('hello');

// 致命错误：第一个参数必须是 OtherClass 类的一个对象
//$foo = new stdClass;
//$myclass->testObj($foo);

// 正确：输出 Hello World
//$myclass->testObj($otherclass);

// 致命错误：第一个参数必须为数组
//$myclass->testArray('a string');

// 正确：输出数组
//$myclass->testArray(['a', 'b', 'c']);

// 正确：输出 int(1)
$myclass->testCallable('print_r',[1]);

