<?php
namespace app\admin\model;
use think\Model;
use think\Db;
use think\Container;

class Logs extends Model
{
    protected $pk = 'id';
    protected $table = 'admin_log';



    //列表
    public function getAllLog($arr)
    {
        $count = Logs::where($arr['w'])->count();
        $list = Logs::where($arr['w'])->order($arr['order'][0],$arr['order'][1])->field("id,type,uid,addtime,remark,inet_ntoa(ip) as ip")->paginate($arr['limit'], $count,['query'=>$arr['pagearr']]);
        if($list) {
            $uid = array_unique($list->column('uid'));
            $uid = Db::table('admin_user')->field("id,nickname")->where("id", 'in', $uid)->select();
            $uid = Container::get('basic')->array_under_reset($uid, 'id');
            foreach($list as $key=>$value) {
                $list[$key] ['addtime']  = date('Y-m-d H:i:s',$value['addtime']);
                $list[$key] ['username']  = isset($uid[$value['uid']]) ? $uid[$value['uid']]['nickname'] : '用户已删除';
            }
        }
        return $list;
    }





}