<?php
namespace app\admin\controller;
use think\Controller;
use think\Container;
use think\Db;
use app\admin\model\Seos;
class Seo extends controller
{
    //seo
    public function seolist()
    {
        $model = new Seos;
        $list = $model->getAll($this->getSelectW());
        $this->assign([
            'list'    => $list,
        ]);
        if($this->request->isPjax()) {
            Container::get('config')->set('default_ajax_return', 'html');
            return $this->fetch('seolist_pjax');
        } else {
            return $this->fetch();
        }
    }
    //添加seo
    public function seo() {
        $id = $this->request->param('id',0,'intval');
        $info = Db::name('seo')->where('id',$id)->find();
        $catelist = Db::name('cate')->where(['tid'=>1,'pid'=>0])->select();
        if($this->request->isPost()) {
            if($info){
                $table = input('post.');
                $table['addtime'] = time();
                $result = Db::name('seo')->where('id',$id)->update($table);
                $result ? $this->success('操作成功','seo/seolist') : $this->error('操作失败');
            }else{
                $table = input('post.');
                $table['addtime'] = time();
                $result = Db::name('seo')->insert($table);
                $result ? $this->success('操作成功','seo/seolist') : $this->error('操作失败');
            }
        }
        $this->assign(['catelist' => $catelist,'info'=>$info]);
        return $this->fetch();
    }
    //删除seo
    public function seodel() {
        $id = $this->request->get('id',0,'intval');
        $rbacmodel = new Seos;
        $r = $rbacmodel->delSeo($id);
        if(true !== $r) $this->error($r);
        $this->redirect('seo/seolist');
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
