<?php
namespace app\admin\model;
use think\Container;
use think\Model;

class Systems extends Model
{
    protected $pk = 'id';
    protected $table = 'friendlink';
    //删除
    public function delFriend($id) {
        if(!$info = Systems::get($id)) return '删除的友情链接不存在！';
        try{
            $user = Container::get('user')->init('admin');
            Systems::startTrans();
            $res = Systems::destroy($id);
            if(!$res) throw new \Exception('删除友情链接失败！');
            $res = $user->setUserLog(1,'删除了友情链接-'.$info['title']);
            if(!$res) throw new \Exception('写入用户权限日志失败！');
            Systems::commit();
            return true;
        }catch (\Exception $e) {
            Systems::rollback();
            return $e->getMessage();
        }
    }
    //列表
    public function getAll($arr, $w=50, $h=50)
    {
        $count = Systems::where($arr['w'])->count();
        $list = Systems::where($arr['w'])->order(['orders'=>'asc',$arr['order'][0]=>$arr['order'][1]])->paginate($arr['limit'], $count,['query'=>$arr['pagearr']]);
        if($list) {
            $baisc = Container::get('basic');
            foreach($list as $key=>$value) {
                $list[$key]['addtime']  = date('Y-m-d H:i:s',$value['addtime']);
                if(!empty($value['img'])) {
                    $list[$key]['thumb']  = $baisc->thumbImg($value['img'],$w,$h);
                } else {
                    $list[$key]['thumb']  = '';
                }
            }
        }
        return $list;
    }
    //获取单个文章
    public function getInfo($id, $w=50, $h=50) {
        $info = Systems::get($id);
        if(!empty($info)) {
            !empty($info['img']) && $info['thumb']  = Container::get('basic')->thumbImg($info['img'],$w,$h);
        }
        return $info;
    }
}