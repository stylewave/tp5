<?php
namespace app\admin\model;
use think\Container;
use think\Model;

class Onlines extends Model
{
    protected $pk = 'id';
    protected $table = 'online';
    //删除
    public function delOnline($id) {
        if(!$info = Onlines::get($id)) return '删除的留言不存在！';
        try{
            $user = Container::get('user')->init('admin');
            Onlines::startTrans();
            $res = Onlines::destroy($id);
            if(!$res) throw new \Exception('删除留言失败！');
            $res = $user->setUserLog(1,'删除了留言-'.$info['username']);
            if(!$res) throw new \Exception('写入用户权限日志失败！');
            Onlines::commit();
            return true;
        }catch (\Exception $e) {
            Onlines::rollback();
            return $e->getMessage();
        }
    }
    //列表
    public function getAll($arr)
    {
        $count = Onlines::where($arr['w'])->count();
        $list = Onlines::where($arr['w'])->order(['addtime'=>'desc'])->paginate($arr['limit'], $count,['query'=>$arr['pagearr']]);
        if($list) {
            $baisc = Container::get('basic');
            foreach($list as $key=>$value) {
                $list[$key]['addtime']  = date('Y-m-d H:i:s',$value['addtime']);
            }
        }
        return $list;
    }
}