<?php
/**
 * 图书列表接口服务类
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/12
 * Time: 15:17
 */
class Api_Book extends PhalApi_Api{
    public function getRules()
    {
        return [
            'getBookList'=>[
                'signature' => ['name' => 'signature', 'type' => 'string','require'=>true,'desc'=>'请求token'],
                'time' => ['name' => 'time', 'type' => 'string','require'=>true,'desc'=>'请求时间戳'],
                'nonce' => ['name' => 'nonce', 'type' => 'string','require'=>true,'desc'=>'请求字符串'],
                'pageNo' => ['name' => 'pageNo', 'type' => 'int', 'min' => 1,'default'=>1,'desc'=>'当前页页码'],
                'pageSize' => ['name' => 'pageSize', 'type' => 'int', 'min' => 1,'max'=>50,'default'=>10,'desc'=>'每一页的数量'],
            ]
        ];
    }

    //过滤验证，无需sign签名认证
 /*   public function filterCheck()
    {

    }*/
    /**
     * 获取图书列表接口
     * @desc 获取图书列表接口
     * @return array BookList 成功时返回BookList,失败时抛出异常
     * @throws PhalApi_Exception
     */
    public function getBookList(){
         $book_list = (new Domain_Book())->getBookList($this);
         $rs = [
             'pageSize'=>$this->pageSize,
             'pageNo'=>$this->pageNo,
             'recordSize'=>$book_list['recordSize'],
             'pageCount'=>$book_list['pageCount'],
             'data'=>$book_list['data']
         ];
         return $rs;
    }
}