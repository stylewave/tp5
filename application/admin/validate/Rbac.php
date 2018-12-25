<?php
namespace app\admin\validate;
use think\Validate;

//验证权限组名称

class Rbac extends Validate
{
    protected $rule =   [
          '__token__'=>'token'
    ];

    // 添加修改权限组，修改的时候权限组名称不一样的时候调用的验证器
    public function sceneEdit()
    {
        return $this->append('title', 'require|unique:admin_rbac');
    }

    // 修改权限组，修改的时候权限组名称一样的时候调用的验证器
    public function sceneAdd()
    {
        return $this->append('title', 'require');
    }

    //修改权限组人员验证器1
    public function sceneEdituser1()
    {
        return $this->append('username|pre|nickname', 'require')
            ->append('username','unique:admin_user')
            ->append('rpass','confirm:pass')
            ->append('pre','integer');
    }

    //修改权限组人员验证器2
    public function sceneEdituser2()
    {
        return $this->append('username|pre|nickname', 'require')
            ->append('rpass','confirm:pass')
            ->append('pre','integer');
    }

    //增加权限组人员验证器
    public function sceneAdduser()
    {
        return $this->append('username|pass|rpass|pre|nickname', 'require')
        ->append('username','unique:admin_user')
        ->append('rpass','confirm:pass')
        ->append('pre','integer');
    }

    protected $message  =   [
        'title.require' => '权限组名称必须',
        'title.unique' => '权限组名称已存在了',
        'username.require'  => '成员登录账号必须',
        'pass.require'   => '密码必须',
        'rpass.require'  => '确认密码必须',
        'pre.require'    => '所属权限组必须',
        'nickname.require'    => '成员姓名必须',
        'username.unique'  => '用户登录账号已存在了',
        'rpass.confirm'  => '两次输入密码不一致',
        'pre.integer'  => '所属权限组不正确',
    ];



}
