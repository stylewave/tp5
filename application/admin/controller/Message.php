<?php
namespace app\admin\controller;
use think\Controller;
use think\Container;
use app\admin\model\Messages;
use app\admin\model\Onlines;
class Message extends controller
{
    //意见咨询
    public function messagelist()
    {
        $model = new Messages;
        $list = $model->getAll($this->getSelectW());
        $this->assign([
            'list'    => $list,
        ]);
        if($this->request->isPjax()) {
            Container::get('config')->set('default_ajax_return', 'html');
            return $this->fetch('messagelist_pjax');
        } else {
            return $this->fetch();
        }
    }
    //删除意见咨询
    public function del() {
        $id = $this->request->get('id',0,'intval');
        $rbacmodel = new Messages;
        $r = $rbacmodel->delMessage($id);
        if(true !== $r) $this->error($r);
        $this->redirect('message/messagelist');
    }

    //留言列表
    public function onlinelist()
    {
        $model = new Onlines;
        $list = $model->getAll($this->getSelectW());
        $this->assign([
            'list'    => $list,
        ]);
        if($this->request->isPjax()) {
            Container::get('config')->set('default_ajax_return', 'html');
            return $this->fetch('onlinelist_pjax');
        } else {
            return $this->fetch();
        }
    }
    //删除留言
    public function delete() {
        $id = $this->request->get('id',0,'intval');
        $rbacmodel = new Onlines;
        $r = $rbacmodel->delOnline($id);
        if(true !== $r) $this->error($r);
        $this->redirect('online/onlinelist');
    }
    //组合查询条件
    private function getSelectW() {
        $data = [
            'cateid' => [
                'keys' => 'cateid',
                'default' => 0,
                'exp' => '=',
                'fun' => 'intval',
            ],
        ];
        return Container::get('basic')->getSelectWhere($this->request->param(), $data);
    }
}
