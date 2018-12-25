<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Users;
use think\Container;
use app\admin\model\Rbacs;

class Rbac extends controller
{
    //权限组用户列表
    public function userList()
    {
        $usermodel = new Users;
        $user = Container::get('user')->init('admin');
        $list = $usermodel->getAllUser($user);
        $this->assign('list', $list);
        return $this->fetch();
    }


    //删除用户
    public function delUser() {
        $id = $this->request->get('id',0,'intval');
        $rbacmodel = new Users;
        $r = $rbacmodel->delUser($id);
        if(true !== $r) $this->error($r);
        $this->success('用户删除成功！');
    }


    //删除权限组
    public function delRbac() {
        $id = $this->request->get('id',0,'intval');
        $rbacmodel = new Rbacs;
        $r = $rbacmodel->delRbac($id);
        if(true !== $r) $this->error($r);
        Container::get('rbac')->setRbCache();
        $this->success('权限组删除成功！');
    }


    //添加修改权限组
    public function addRbac() {
        $id = $this->request->param('id',0,'intval');
        $rbacmodel = new Rbacs;
        $info = $rbacmodel->getRbacInfo($id);
        $rbac = Container::get('rbac');
        $menus = $rbac->getMenus($info);
        if($this->request->isPost()) {
            $qx = $rbac->getRbac($menus);
            $data = array_merge($this->request->only(['title','ms']), ['pre'=>$qx]);
            $cj = empty($info) ? 'edit' : ($info['title'] != $data['title']) ? 'edit' : 'add';//验证器场景
            $r = $this->validate(array_merge($data,$this->request->only(['__token__'])),'app\admin\validate\Rbac.'.$cj);
            if(true !== $r) $this->error($r);
            $return = $rbac->setRbac($data,$info?(int)$info['id']:0);
            Container::get('rbac')->setRbCache();
            $return['code'] == 1 ? $this->success('操作权限组成功！') : $this->error($return['msg']);
        }
        $this->assign(['menus' => $menus, 'info'=>$info]);
        return $this->fetch();
    }


    //添加组成员
    public function addUser() {
        $id = $this->request->param('id',0,'intval');
        $rbacmodel = new Users;
        $info = $rbacmodel->getUserInfo($id);
        if($info && $info['pre'] == -1) $this->error('超级管理员禁止修改');
        $rbac = Container::get('rbac');
        $rbacs = $rbac->getRbacList();
        if($this->request->isPost()) {
            $data = $this->request->only(['username','nickname','pass','rpass','pre','__token__']);
            $cj = empty($info) ? 'adduser' : ($info['username'] != $data['username']) ? 'edituser1' : 'edituser2';//验证器场景
            $r = $this->validate($data,'app\admin\validate\Rbac.'.$cj);
            if(true !== $r) $this->error($r);
            $return = $rbac->setRbacUser($data,$info);
            $return['code'] == 1 ? $this->success('操作权限组成员成功！') : $this->error($return['msg']);
        }
        $this->assign(['rbacs' => $rbacs,  'info'=>$info]);
        return $this->fetch();
    }


    //权限组 列表
    public function rbacList() {
        $rbacmodel = new Rbacs;
        $list = $rbacmodel->getAllRbac();
        $this->assign('list', $list);
        return $this->fetch();
    }


}
