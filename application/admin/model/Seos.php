<?php
namespace app\admin\model;
use think\Container;
use think\Model;

class Seos extends Model
{
    protected $pk = 'id';
    protected $table = 'seo';
    //删除
    public function delSeo($id) {
        if(!$info = Seos::get($id)) return '删除的seo不存在！';
        try{
            $user = Container::get('user')->init('admin');
            Seos::startTrans();
            $res = Seos::destroy($id);
            if(!$res) throw new \Exception('删除seo失败！');
            $res = $user->setUserLog(1,'删除了seo-'.$info['title']);
            if(!$res) throw new \Exception('写入用户权限日志失败！');
            Seos::commit();
            return true;
        }catch (\Exception $e) {
            Seos::rollback();
            return $e->getMessage();
        }
    }
    //列表
    public function getAll($arr)
    {
        $count = Seos::where($arr['w'])->count();
        $list = Seos::where($arr['w'])->order('id','asc')->paginate($arr['limit'], $count,['query'=>$arr['pagearr']]);
        if($list) {
            foreach($list as $key=>$value) {
                $list[$key]['addtime']  = date('Y-m-d H:i:s',$value['addtime']);
            }
        }
        return $list;
    }
}