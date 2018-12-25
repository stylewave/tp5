<?php
namespace app\admin\controller;
use think\Controller;
use think\Container;
use app\admin\model\Products;
use app\admin\model\Books;
use think\Db;
class Product extends controller
{
    //产品列表
    public function aList()
    {
        $usermodel = new Products;
        $list = $usermodel->getAll($this->getSelectW());
        $catelist = Container::get('cate')->getCateCache('cate',Container::get('product')->getPtid(),false,'tree');
        $this->assign([
            'list'    => $list,
            'catelist'    => $catelist,
        ]);
        if($this->request->isPjax()) {
            Container::get('config')->set('default_ajax_return', 'html');
            return $this->fetch('aList_pjax');
        } else {
            return $this->fetch();
        }
    }

    //产品操作，目前排序和推荐
    public function ajaxProduct() {
        $id = $this->request->param('id',0,'intval');
        $do = $this->request->param('do','','trim');
        if(!in_array($do, ['tj','qxtj','order'])) exit('error');
        if($this->request->isAjax()) {
            $basic = Container::get('basic');
            try{
                $cate = Container::get('cate');
                $usermodel = new Products;
                $info = $usermodel->getInfo($id);
                if(empty($info)) throw new \Exception('操作的产品不存在！');
                $r = [];
                switch ($do) {
                    case 'tj':
                        $r = $cate->ajaxCate($info,'is_floor', 1, 'product');
                        break;
                    case 'qxtj':
                        $r = $cate->ajaxCate($info,'is_floor', 0, 'product');
                        break;
                    case 'order':
                        $order = $this->request->param('order',0,'intval');
                        $r = $cate->ajaxCate($info,'orders', $order, 'product');
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

    //删除产品
    public function del() {
        $id = $this->request->get('id',0,'intval');
        $rbacmodel = new Products;
        $r = $rbacmodel->delProduct($id);
        if(true !== $r) $this->error($r);
        $this->success('产品删除成功！');
    }

    //添加产品
    public function add()
    {
        $id = $this->request->param('id', 0, 'intval');

        $rbacmodel = new Products;
        $info = $rbacmodel->getInfo($id);
        $cate = Container::get('cate');
        $article = Container::get('product');
        $catelist = $cate->getCateCache('cate', $article->getPtid(), false, 'tree');
        $fanglist = Db::name('article')->where(['cateid'=>99])->select();
        if ($this->request->isPost()) {
            $old = input('post.');
            //kind编辑器上传
            if (isset($_GET['dir']) && !empty($_GET['dir'])) {
                return Container::get('upload')->uploads($this->request->file('imgFile'), false, false, $_GET['dir']);
            }
            $data = $this->request->only(['title','is_show','en_title','pic', 'description','en_description', 'id', 'orders' => 0, 'cateid', 'pic', 'content_td','content_td_en','content_js','content_js_en', '__token__']);
            $cj = empty($info) ? 'add' : ($info['title'] != $data['title']) ? 'add' : '';//验证器场景
            $r = $this->validate($data, 'app\admin\validate\Product.' . $cj);
            if (true !== $r) $this->error($r);
            $return = $article->setProduct($data,$info,$old,$this->request->file('img'), $this->request->file('pic'));
            $return['code'] == 1 ? $this->success('操作成功！') : $this->error($return['msg']);
        }
        $image_arr = explode(",", $info['pic']);
//        dump($image_arr);die;
        $this->assign(['catelist' => $catelist, 'info' => $info, 'image_arr' => $image_arr,'fanglist'=>$fanglist]);
        return $this->fetch();
    }
    // 处理AJAX删除图片的请求
    public function ajaxDelPic()
    {
        $picId = $this->request->param('picid');
        $id = $this->request->param('id');
        $product = Db::name('product')->where('id',$id)->field('id,pic')->find();
        $array = explode(',',$product['pic']);
        unset($array[$picId]);
        $data['pic'] = implode(',',$array);
        Db::name('product')->where('id',$id)->field('id,pic')->update($data);
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

    //产品手册列表
    public function sList()
    {
        $usermodel = new Books;
        $list = $usermodel->getAll($this->getSelectW());
        $catelist = Db::name('product')->field('id,title')->select();
        $this->assign([
            'list'    => $list,
            'catelist'    => $catelist,
        ]);
        if($this->request->isPjax()) {
            Container::get('config')->set('default_ajax_return', 'html');
            return $this->fetch('slist_pjax');
        } else {
            return $this->fetch();
        }
    }
    //删除产品手册
    public function delete() {
        $id = $this->request->get('id',0,'intval');
        $rbacmodel = new Books;
        $r = $rbacmodel->delBook($id);
        if(true !== $r) $this->error($r);
        $this->success('产品资料删除成功！');
    }

    //添加产品手册
    public function insert()
    {
        $id = $this->request->param('id', 0, 'intval');
        $rbacmodel = new Books;
        $info = $rbacmodel->getInfo($id);
        if($info){
            $info['publishtime'] = date("Y-m-d",$info['publishtime']);
        }
        $book = Container::get('book');
        $catelist = Db::name('product')->field('id,title')->select();
        if($this->request->isPost()) {
            $qd = $this->request->file('qd');
            $qds = $this->request->file('qds');
            $zl = $this->request->file('zl');
            $zls = $this->request->file('zls');
            $wd = $this->request->file('wd');
            $wds = $this->request->file('wds');
            $data = $this->request->only(['qdtitle','en_qdtitle','wdtitle','en_wdtitle','zltitle','en_zltitle','qdsize','qdsizes','wdsize','wdsizes','zlsize','en_zlsize','publishtime','system','id','cateid','__token__']);
            $return = $book->setBook($data,$info,$this->request->param('publishtime'),$qd,$qds,$zl,$zls,$wd,$wds);
            $return['code'] == 1 ? $this->success('操作成功！') : $this->error($return['msg']);
        }
        $this->assign(['catelist' => $catelist, 'info' => $info]);
        return $this->fetch();
    }
}
