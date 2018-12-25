<?php
namespace app\admin\controller;
use think\Controller;
use think\Container;
use think\Db;
use app\admin\model\Banners;
class Banner extends controller
{
    //Banner列表
    public function bannerlist()
    {
        $model = new Banners;
        $list = $model->getAll($this->getSelectW());
        $catelist = Container::get('cate')->getCateCache('cate',Container::get('banner')->getAtid(),false,'tree');
        $this->assign([
            'list'    => $list,
            'catelist'    => $catelist,
        ]);
        if($this->request->isPjax()) {
            Container::get('config')->set('default_ajax_return', 'html');
            return $this->fetch('bannerlist_pjax');
        } else {
            return $this->fetch();
        }
    }
    //文章操作，目前排序和推荐
    public function ajaxBanner() {
        $id = $this->request->param('id',0,'intval');
        $do = $this->request->param('do','','trim');
        if(!in_array($do, ['tj','qxtj','order'])) exit('error');
        if($this->request->isAjax()) {
            $basic = Container::get('basic');
            try{
                $cate = Container::get('cate');
                $usermodel = new Banners;
                $info = $usermodel->getInfo($id);
                if(empty($info)) throw new \Exception('操作的图片不存在！');
                $r= [];
                switch ($do) {
                    case 'tj':
                        $r = $cate->ajaxCate($info,'ist', 1, 'banner');
                        break;
                    case 'qxtj':
                        $r = $cate->ajaxCate($info,'ist', 0, 'banner');
                        break;
                    case 'order':
                        $order = $this->request->param('order',0,'intval');
                        $r = $cate->ajaxCate($info,'orders', $order, 'banner');
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
    //添加banner
    public function banner() {
        $id = $this->request->param('id',0,'intval');
        $info = Db::name('banner')->where('id',$id)->find();
        $cate = Container::get('cate');
        $banner = Container::get('banner');
        $catelist = $cate->getCateCache('cate',$banner->getAtid(),false,'tree');
        if($this->request->isPost()) {
            if($info){
                $table = input('post.');
                $img = Container::get('upload')->uploads($this->request->file('img'),'banner','image',false,'');
                if($img['error'] == 0) $table['img'] = $img['url'];//上传图片
                $thumb = Container::get('upload')->uploads($this->request->file('thumb'),'banner','image',false,'');
                if($thumb['error'] == 0) $table['thumb'] = $thumb['url'];//上传图片
                $table['addtime'] = time();
                $result = Db::name('banner')->where('id',$id)->update($table);
                $result ? $this->success('操作成功','banner/bannerlist') : $this->error('操作失败');
            }else{
                $table = input('post.');
                $img = Container::get('upload')->uploads($this->request->file('img'),'banner','image',false,'');
                if($img['error'] == 0) $table['img'] = $img['url'];//上传图片
                $thumb = Container::get('upload')->uploads($this->request->file('thumb'),'banner','image',false,'');
                if($thumb['error'] == 0) $table['thumb'] = $thumb['url'];//上传图片
                $table['addtime'] = time();
                $result = Db::name('banner')->insert($table);
                $result ? $this->success('操作成功','banner/banner') : $this->error('操作失败');
            }
        }
        $this->assign(['catelist' => $catelist,'info' => $info]);
        return $this->fetch();
    }
    //删除banner
    public function del() {
        $id = $this->request->get('id',0,'intval');
        $rbacmodel = new Banners;
        $r = $rbacmodel->delBanner($id);
        if(true !== $r) $this->error($r);
        $this->redirect('Banner/bannerlist');
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
