<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/14
 * Time: 12:16
 */
ini_set('default_socket_timeout', -1); //设置不超时，否则会报错，默认是60s
$redis = new Redis();
$redis->connect('127.0.0.1', 6379);
$redis->subscribe(["room1","room2"],function($redis, $chan, $msg){
    switch($chan) {
        case 'room1':
            echo "任务：" . $msg . "，开始处理\r\n";
            //模拟耗时任务
            sleep(5);
            echo "任务：" . $msg . "，结束处理\r\n";
            break;
        case 'room2':
            echo $msg;
            break;
    }
});