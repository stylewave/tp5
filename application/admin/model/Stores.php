<?php
namespace app\admin\model;
use think\Container;
use think\Model;
use think\Db;

class Stores extends Model
{
    protected $pk = 'id';
    protected $table = 'store';
    //删除
    public function delBanner($id) {
        if(!$info = Stores::get($id)) return '删除的数据不存在！';
        try{
            $user = Container::get('user')->init('admin');
            Stores::startTrans();
            $res = Stores::destroy($id);
            if(!$res) throw new \Exception('删除数据失败！');
            $res = $user->setUserLog(1,'删除了数据-'.$info['title']);
            if(!$res) throw new \Exception('写入用户权限日志失败！');
            Stores::commit();
            return true;
        }catch (\Exception $e) {
            Stores::rollback();
            return $e->getMessage();
        }
    }
    //列表
    public function getAll($arr)
    {
        $count = Stores::where($arr['w'])->count();
        $list = Stores::where($arr['w'])->paginate($arr['limit'], $count,['query'=>$arr['pagearr']]);
        if($list) {
            foreach($list as $key=>$value) {
                $list[$key]['addtime']  = date('Y-m-d H:i:s',$value['addtime']);
            }
        }
        return $list;
    }
    //获取单个文章
    public function getInfo($id) {
        $info = Stores::get($id);
        return $info;
    }
}