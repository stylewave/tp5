<?php
namespace app\admin\controller;
use think\Controller;
use think\Container;
use think\Db;
use app\admin\model\Systems;
use app\admin\model\Configs;
class System extends controller
{
    //系统设置
    public function index()
    {
        $info = Configs::getInfo();
        if($this->request->isPost()){
            $table = input('post.');
            $img = Container::get('upload')->uploads($this->request->file('logo'),'config','image',false,'');
            if($img['error'] == 0) $table['logo'] = $img['url'];//上传图片
            $imgs = Container::get('upload')->uploads($this->request->file('img'),'config','image',false,'');
            if($imgs['error'] == 0) $table['img'] = $imgs['url'];//上传图片
            $model = new Configs;
            $result = $model->setInfo($table);
            if($result) $this->success('操作成功！','system/index');
            else        $this->error('操作失败');
        }
        $this->assign('info',$info);
        return $this->fetch();
    }
    //友情链接列表
    public function friendlist()
    {
        $model = new Systems;
        $list = $model->getAll($this->getSelectW());
        $this->assign([
            'list'    => $list,
        ]);
        if($this->request->isPjax()) {
            Container::get('config')->set('default_ajax_return', 'html');
            return $this->fetch('friendlist_pjax');
        } else {
            return $this->fetch();
        }
    }
    //排序和推荐
    public function ajaxFriend() {
        $id = $this->request->param('id',0,'intval');
        $do = $this->request->param('do','','trim');
        if(!in_array($do, ['tj','qxtj','order'])) exit('error');
        if($this->request->isAjax()) {
            $basic = Container::get('basic');
            try{
                $cate = Container::get('cate');
                $usermodel = new Systems;
                $info = $usermodel->getInfo($id);
                if(empty($info)) throw new \Exception('操作的内容不存在！');
                $r = [];
                switch ($do) {
                    case 'tj':
                        $r = $cate->ajaxCate($info,'ist', 1, 'friendlink');
                        break;
                    case 'qxtj':
                        $r = $cate->ajaxCate($info,'ist', 0, 'friendlink');
                        break;
                    case 'order':
                        $order = $this->request->param( 'order',0,'intval');
                        $r = $cate->ajaxCate($info,'orders', $order, 'friendlink');
                        break;
                }
                if($r['code'] != 1) throw new \Exception($r['msg']);
                return $basic->rmsg('ok',1,'json');
            }catch (\Exception $e) {
                return $basic->rmsg($e->getMessage(),0,'json');
            }
        } else {
            exit('erros');
        }
    }
    //添加友情链接
    public function friend() {
        $id = $this->request->param('id',0,'intval');
        $info = Db::name('friendlink')->where('id',$id)->find();
        if($this->request->isPost()) {
            if($info){
                $table = input('post.');
                $img = Container::get('upload')->uploads($this->request->file('img'),'friend','image',false,'');
                if($img['error'] == 0) $table['img'] = $img['url'];//上传图片
                $table['addtime'] = time();
                $result = Db::name('friendlink')->where('id',$id)->update($table);
                $result ? $this->success('操作成功','system/friendlist') : $this->error('操作失败');
            }else{
                $table = input('post.');
                $img = Container::get('upload')->uploads($this->request->file('img'),'friend','image',false,'');
                if($img['error'] == 0) $table['img'] = $img['url'];//上传图片
                $table['addtime'] = time();
                $result = Db::name('friendlink')->insert($table);
                $result ? $this->success('操作成功','system/friendlist') : $this->error('操作失败');
            }
        }
        $this->assign('info',$info);
        return $this->fetch();
    }
    //删除友情链接
    public function del() {
        $id = $this->request->get('id',0,'intval');
        $rbacmodel = new Systems;
        $r = $rbacmodel->delFriend($id);
        if(true !== $r) $this->error($r);
        $this->redirect('system/friendlist');
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
    //清空系统缓存
    public function admin(){
        header("Content-type: text/html; charset=utf-8");
        $dirs = array('/runtime/');//清文件缓存
        @mkdir('runtime',0777,true);
        foreach($dirs as $value) {  //清理缓存
            $this->rmdirr($value);
        }
        $this->success('缓存清除成功！','admin/index/index');die;
    }
    //处理方法
    public function rmdirr($dirname) {
        if (!file_exists($dirname)) {
            return false;
        }
        if (is_file($dirname) || is_link($dirname)) {
            return unlink($dirname);
        }
        $dir = dir($dirname);
        if($dir){
            while (false !== $entry = $dir->read()) {
                if ($entry == '.' || $entry == '..') {
                    continue;
                }
                $this->rmdirr($dirname . DIRECTORY_SEPARATOR . $entry);//递归
            }
        }
        $dir->close();
        return rmdir($dirname);
    }
}
