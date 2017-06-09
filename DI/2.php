<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/9
 * Time: 16:10
 * Description: 传统的业务逻辑
 *   直接在Storage类中实例化文件存储方式，造成了代码之间的高耦合。
 */

/**
 * 高层:存储类
 */
class Storage{
    public $storage;

    public function __construct()
    {
        $this->storage = new FileStorage();
    }


    public function store()
    {
        $this->storage->save();
    }
}

/**
 * 底层：文件存储方式
 */
class FileStorage{
    public function save()
    {
        echo "File Storage";
    }
}

//实例化存储：
$storage = new Storage();
$storage->store();
