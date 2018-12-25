<?php
namespace app\admin\controller;
use think\Controller;
use think\Container;
use think\Db;
use app\admin\model\Stores;
class Store extends controller
{
    //store列表
    public function storelist()
    {
        $model = new Stores;
        $list = $model->getAll($this->getSelectW());
        $this->assign([
            'list'    => $list,
        ]);
        if($this->request->isPjax()) {
            Container::get('config')->set('default_ajax_return', 'html');
            return $this->fetch('storelist_pjax');
        } else {
            return $this->fetch();
        }
    }
    //添加store
    public function store() {
        $id = $this->request->param('id',0,'intval');
        $info = Db::name('store')->where('id',$id)->find();
        $store = Container::get('store');
        if($this->request->isPost()) {
            $data = $this->request->only(['id','address','en_address','email','tel','username','en_username','mobile','qq','__token__']);
            $return = $store->setStore($data,$info);
            $return['code'] == 1 ? $this->success('操作成功！') : $this->error($return['msg']);
        }
        $this->assign(['info' => $info]);
        return $this->fetch();
    }
    //删除store
    public function del() {
        $id = $this->request->get('id',0,'intval');
        $rbacmodel = new Stores;
        $r = $rbacmodel->delStore($id);
        if(true !== $r) $this->error($r);
        $this->redirect('Store/storelist');
    }
    //组合查询条件
    private function getSelectW() {
        $data = [
            'cateid' => [
                'keys' => 'cateid',
                'default' => 0,
                'exp' => '=',
                'fun' => 'trim',
            ],
        ];
        return Container::get('basic')->getSelectWhere($this->request->param(), $data);
    }
}
