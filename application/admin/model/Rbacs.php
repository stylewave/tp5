<?php
namespace app\admin\model;
use think\Model;
use think\Container;
use think\Db;

class Rbacs extends Model
{
    protected $pk = 'id';
    protected $table = 'admin_rbac';
    //删除权限组
    public function delRbac($id) {
        if(!$info = Rbacs::get($id)) return '删除的权限组不存在！';
        $count = Db::table('admin_user')->where('pre',$id)->count();
        if($count > 0) return '权限组下面有成员，不能删除！';
        try{
            Rbacs::startTrans();
            $res = Rbacs::destroy($id);
            if(!$res) throw new \Exception('删除权限组失败！');
            $res = Container::get('user')->init('admin')->setUserLog(2,'删除了权限组'.$info['title']);
            if(!$res) throw new \Exception('写入用户权限日志失败！');
            Rbacs::commit();
            return true;
        }catch (\Exception $e) {
            Rbacs::rollback();
            return $e->getMessage();
        }
    }

    //获取权限组详细信息
    public function getRbacInfo($id) {
        if($info =  Rbacs::get($id)) $info->pre = json_decode($info->pre,true);
        return $info;
    }

    //权限组列表
    public function getAllRbac()
    {
        $count = Rbacs::count();
        $list = Rbacs::order("id",'desc')->paginate(10, $count)->each(function($item, $key){
            $item->pre = Container::get('rbac')->parse($item->pre);
            $item->addtime   = date('Y-m-d H:i:s',$item->addtime);
        });
        return $list;
    }





}