<?php
namespace app\admin\model;
use think\Container;
use think\Model;

class Products extends Model
{
    protected $pk = 'id';
    protected $table = 'product';
    //删除
    public function delProduct($id) {
        if(!$info = Products::get($id)) return '删除的产品不存在！';
        try{
            $user = Container::get('user')->init('admin');
            Products::startTrans();
            $res = Products::destroy($id);
            if(!$res) throw new \Exception('删除产品失败！');
            $res = $user->setUserLog(1,'删除了产品-'.$info['title']);
            if(!$res) throw new \Exception('写入用户权限日志失败！');
            Products::commit();
            return true;
        }catch (\Exception $e) {
            Products::rollback();
            return $e->getMessage();
        }
    }
    //列表
    public function getAll($arr, $w=50, $h=50)
    {
        $count = Products::where($arr['w'])->count();
        $list = Products::where($arr['w'])->order(['orders'=>'asc',$arr['order'][0]=>$arr['order'][1]])->paginate($arr['limit'], $count,['query'=>$arr['pagearr']]);
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
    //获取单个产品
    public function getInfo($id, $w=50, $h=50) {
        $info = Products::get($id);
        if(!empty($info)) {
            !empty($info['img']) && $info['thumb']  = Container::get('basic')->thumbImg($info['img'],$w,$h);
        }
        return $info;
    }
    protected function before_update(&$data, $option)
    {

    }
}