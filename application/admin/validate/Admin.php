<?php
namespace app\admin\validate;
use think\Validate;
use think\Container;

//后台管理用户验证器

class Admin extends Validate
{
    protected $rule =   [
        //登录数据验证 start
        'code|验证码'   => 'require|captcha',
        'pass|密码'         => 'require',
        'username'     => 'checkLogin',
        //登录数据验证 end
    ];

    protected function checkLogin($value,$rule,$data=[]) {
        $r = Container::get('user')->init('admin')->setLogin($value,$data);
        return $r['code']==1?true:$r['msg'];
    }

//    protected $message  =   [
//        //登录数据验证 start
//        'username.require' => '用户名必填！',
//        'username.unique'  => '用户不存在！',
//        'pass.length'      => '密码长度不符合！',
//        //登录数据验证 end
//    ];
}
