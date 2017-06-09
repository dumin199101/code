<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/9
 * Time: 16:30
 * Description:
 *  通过接口进行setter方法注入方式改进:实现解耦,但是造成了一种问题：不断的new实例对象并且进行set操作.通过DI把set跟new操作放到DI容器中，延时生成。
 *  $connection = new Connection();
    $session = new Session();
    $fileSystem = new FileSystem();
    $filter = new Filter();
    $selector = new Selector();

    //把实例作为参数传递给构造函数
    $some = new SomeComponent($connection, $session, $fileSystem, $filter, $selector);

    // ... 或者使用setter

    $some->setConnection($connection);
    $some->setSession($session);
    $some->setFileSystem($fileSystem);
    $some->setFilter($filter);
    $some->setSelector($selector);
 *
 * 使用DI解决：
 * class SomeComponent{

        protected $_di;

        public function __construct($di)
        {
        $this->_di = $di;
        }

        public function someDbTask()
        {

        // 获得数据库连接实例
        // 总是返回一个新的连接
        $connection = $this->_di->get('db');

        }

        public function someOtherDbTask()
        {

        // 获得共享连接实例
        // 每次请求都返回相同的连接实例
        $connection = $this->_di->getShared('db');

        // 这个方法也需要一个输入过滤的依赖服务
        $filter = $this->_di->get('filter');

        }

        }

        $di = new Phalcon\DI();

        //在容器中注册一个db服务
        $di->set('db', function() {
        return new Connection(array(
        "host" => "localhost",
        "username" => "root",
        "password" => "secret",
        "dbname" => "invo"
        ));
        });

        //在容器中注册一个filter服务
        $di->set('filter', function() {
        return new Filter();
        });

        //在容器中注册一个session服务
        $di->set('session', function() {
        return new Session();
        });

        //把传递服务的容器作为唯一参数传递给组件
        $some = new SomeComponent($di);

        $some->someTask();
 */
class DI{
    private $_service = [];

    //注入实例
    public function set($key,$definition)
    {
        $this->_service[$key] = $definition;
    }

    //获取实例
    public function get($key)
    {
        $instance = new stdClass();
        if(isset($this->_service[$key])){
            $definition = $this->_service[$key];
        }else{
            throw new Exception("Service '" . $key . "' wasn't found in the dependency injection container");
        }

        if(is_callable($definition)){
            $instance = call_user_func($definition);
        }

        return $instance;
    }
}

class RedisDB{
    private $_options;
    public function __construct($options)
    {
        $this->_options = $options;
    }

    public function get($key)
    {
        echo "get {$key}";
    }

    public function set($key,$val)
    {
        echo "set {$key},{$val}";
    }

    public function del($key)
    {
        echo "del {$key}";
    }
}

//实际使用：
$di = new DI();
$di->set('redis',function(){
   return new RedisDB([
       'host'=>'127.0.0.1',
       'port'=>'6379'
   ]);
});

$di->get('redis')->set('title','Hello World');
echo '<br/>';
$di->get('redis')->get('title');
echo '<br/>';
$di->get('redis')->del('title');


