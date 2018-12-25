<?php
namespace app\admin\model;
use think\Model;
use think\Container;
use think\Db;

class Users extends Model
{
    protected $pk = 'id';
    protected $table = 'admin_user';

    //获取成员详情
    public function getUserInfo($id) {
        return  Users::get($id);
    }


    //删除用户
    public function delUser($id) {
        if(!$info = Users::get($id)) return '删除的用户不存在！';
        try{
            $user = Container::get('user')->init('admin');
            Users::startTrans();
            $res = Users::destroy($id);
            if(!$res) throw new \Exception('删除用户失败！');
            $res = $user->setUserLog(2,'删除了用户-'.$info['username']);
            if(!$res) throw new \Exception('写入用户权限日志失败！');
            $res = Db::name('admin_rbac')->where("id",(int)$info['pre'])->setDec('num');
            if(!$res) throw new \Exception('更新权限组成员数量失败！');
            Users::commit();
            //写入缓存
            $user->setDelUserCache($id);
            return true;
        }catch (\Exception $e) {
            Users::rollback();
            return $e->getMessage();
        }
    }

    //获取所有权限组成员，分页
    public function getAllUser($user, $limit=20)
    {
        $rbac = Container::get('rbac')->getRbacList();
        $rbac = $rbac ? Container::get('basic')->array_under_reset($rbac,'id') : [];
        $count = Users::count();
        $list = Users::order("id",'asc')->field($user->getFiledName())->paginate($limit, $count);
        if($list) {
            foreach ($list as $key=>$item) {
                $item->logintime = empty($item->logintime) ? '--' : date('Y-m-d H:i:s',$item->logintime);
                $item->loginip   = empty($item->loginip) ? '--' : $item->loginip;
                $item->addtime   = $item->pre == -1 ? '--' : date('Y-m-d H:i:s',$item->addtime);
                $item->pres   = $item->pre == -1 ? '超级管理员' : $rbac[$item->pre]['title'];
            }
        }
        return $list;
    }


}