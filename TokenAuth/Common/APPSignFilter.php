<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/14
 * Time: 17:10
 */
class Common_APPSignFilter implements PhalApi_Filter{
    public function check()
    {
        $signature = DI()->request->get('signature');
        $timestamp = DI()->request->get('time');
        $nonce = DI()->request->get('nonce');

        //token有效期2分钟
        if($timestamp+120<time()){
            throw new PhalApi_Exception_BadRequest('sign is expired', 2);
        }

        //验证token
        $tmpStr = Common_Function::token($timestamp,$nonce);

        if($tmpStr!=$signature){
            DI()->logger->debug('Wrong Sign', array('needSign' => $tmpStr));
            throw new PhalApi_Exception_BadRequest('wrong sign', 1);
        }
    }


}