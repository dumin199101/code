<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/9
 * Time: 16:25
 * Description:
 *   通过接口进行setter方法注入方式改进:实现解耦,高层负责定义接口，底层负责实现
 */

/**
 * 高层:存储类
 */
class Storage{

    public $storage;

    public function __construct()
    {
    }

    public function setStorage($storage)
    {
        $this->storage = $storage;
    }


    public function store()
    {
        $this->storage->save();
    }
}

/**
 * 声明存储接口
 * Interface Storage
 */
Interface StorageImpl{
    public function save();
}

/**
 * 底层：文件存储方式
 */
class FileStorage implements StorageImpl{
    public function save()
    {
        echo "File Storage";
    }
}

/**
 * 底层：Redis存储方式
 */
class RedisStorage implements StorageImpl{
    public function save()
    {
        echo "Redis Storage";
    }
}


//实例化存储：
$file_storage = new FileStorage();
$redis_storage = new RedisStorage();
$storage = new Storage();
$storage->setStorage($file_storage);
$storage->store();
echo '<br/>';
$storage->setStorage($redis_storage);
$storage->store();