<?php
namespace app\admin\model;
use think\Container;
use think\Model;

class Banners extends Model
{
    protected $pk = 'id';
    protected $table = 'banner';
    //删除
    public function delBanner($id) {
        if(!$info = Banners::get($id)) return '删除的banner不存在！';
        try{
            $user = Container::get('user')->init('admin');
            Banners::startTrans();
            $res = Banners::destroy($id);
            if(!$res) throw new \Exception('删除banner失败！');
            $res = $user->setUserLog(1,'删除了banner-'.$info['title']);
            if(!$res) throw new \Exception('写入用户权限日志失败！');
            Banners::commit();
            return true;
        }catch (\Exception $e) {
            Banners::rollback();
            return $e->getMessage();
        }
    }
    //列表
    public function getAll($arr, $w=50, $h=50)
    {
        $count = Banners::where($arr['w'])->count();
        $list = Banners::where($arr['w'])->order(['orders'=>'asc',$arr['order'][0]=>$arr['order'][1]])->paginate($arr['limit'], $count,['query'=>$arr['pagearr']]);
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
        $info = Banners::get($id);
        if(!empty($info)) {
            !empty($info['img']) && $info['thumb']  = Container::get('basic')->thumbImg($info['img'],$w,$h);
        }
        return $info;
    }
}