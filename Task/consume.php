<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/13
 * Time: 17:28
 * 当我们接收到用户的推送请求时
 *     ↓
 * 把推送请求加入到队列API里面不做任何操作(比如加入到左边)
 *    ↓
 * 在后台有一个PHP脚本运行一直在读取队列(读取右边就是后进后出,如果读取左边就是先进先出)
 *   ↓
 * 然后执行响应的推送逻辑
 * brpop:阻塞并等待一个列队不为空时，再pop出最左或最右的一个元素,time秒后超时，0秒永不超时
 * 一般来说此脚本是一个死循环，或者Shell定时任务，我们会使用block阻塞来解决读取不到值，循环过快的问题,主要是为了避免轮询，当有的时候我就处理，没有的时候我就等待
 * nohup php consume.php & 脚本后台执行
 * ps -ef | grep comsume.php 查看进程号结束后台脚本
 *
 * #无限循环读取任务队列中的内容
 * loop
 * task=RPOR queue
 * if task
 * #如果任务队列中有任务则执行它
 * execute( task)
 * else
 * #如果没有则等待1秒以免过于频繁地请求数据
 * wait 1 second
 * 不过还有一点不完美的地方：当任务队列中没有任务时消费者 每秒都会调用一次RPOP命令查看是否有新任务 。如果可以实现一旦有新任务加入任务队列就通知消费者就好了。
 * BRPOP命令和RPOP命令相似，唯一的区别是当列表中没有元素时BRPOP命令会一直阻塞住连接，直到有新元素加入。如上段代码可改写为：
 * loop
 * #如果任务队列中没有新任务，BRPOP 命令会一直阻塞，不会执行execute()。
 * task=BRPOP queue, 0
 * #返回值是一个数组（见下介绍），数组第二个元素是我们需要的任务。
 * execute( task[1])
 *
 *
 */
ini_set('default_socket_timeout', -1); //设置不超时，否则会报错，默认是60s
$redis = new Redis();
$redis->connect('127.0.0.1', 6379);
//while($data = $redis->brPop(["myTaskList"],5)){
//    $value = $data[1];
//    echo "任务：" . $value . "，开始处理\r\n";
//    //模拟耗时任务
//    sleep(5);
//    echo "任务：" . $value . "，结束处理\r\n";
//}

//while(1){
//    if($data = $redis->brPop(["myTaskList"],5)){
//        $value = $data[1];
//        echo "任务：" . $value . "，开始处理\r\n";
//        //模拟耗时任务
//        sleep(5);
//        echo "任务：" . $value . "，结束处理\r\n";
//    }
//}

while (1) {
    $data = $redis->brPop(["myTaskList"], 0);
    $value = $data[1];
    echo "任务：" . $value . "，开始处理\r\n";
    //模拟耗时任务
    sleep(5);
    echo "任务：" . $value . "，结束处理\r\n";
}
