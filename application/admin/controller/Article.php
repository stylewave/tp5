<?php
namespace app\admin\controller;
use think\Controller;
use think\Container;
use app\admin\model\Articles;

class Article extends controller
{
    //文章列表
    public function aList()
    {
        $usermodel = new Articles;
        $list = $usermodel->getAll($this->getSelectW());
        $catelist = Container::get('cate')->getCateCache('cate',Container::get('article')->getAtid(),false,'tree');
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

    //文章操作，目前排序和推荐
    public function ajaxArticle() {
        $id = $this->request->param('id',0,'intval');
        $do = $this->request->param('do','','trim');
        if(!in_array($do, ['tj','qxtj','order'])) exit('error');
        if($this->request->isAjax()) {
            $basic = Container::get('basic');
            try{
                $cate = Container::get('cate');
                $usermodel = new Articles;
                $info = $usermodel->getInfo($id);
                if(empty($info)) throw new \Exception('操作的文章不存在！');
                $r = [];
                switch ($do) {
                    case 'tj':
                        $r = $cate->ajaxCate($info,'ist', 1, 'article');
                        break;
                    case 'qxtj':
                        $r = $cate->ajaxCate($info,'ist', 0, 'article');
                        break;
                    case 'order':
                        $order = $this->request->param('order',0,'intval');
                        $r = $cate->ajaxCate($info,'orders', $order, 'article');
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

    //删除文章
    public function del() {
        $id = $this->request->get('id',0,'intval');
        $rbacmodel = new Articles;
        $r = $rbacmodel->delArticle($id);
        if(true !== $r) $this->error($r);
        $this->success('文章删除成功！');
    }

    //添加文章
    public function add() {
        $id = $this->request->param('id',0,'intval');
        $rbacmodel = new Articles;
        $info = $rbacmodel->getInfo($id);
        if($info){
            $info['publishtime'] = date("Y-m-d",$info['publishtime']);
        }
        $cate = Container::get('cate');
        $article = Container::get('article');
        $catelist = $cate->getCateCache('cate',$article->getAtid(),false,'tree');
        if($this->request->isPost()) {
            //kind编辑器上传
            if(isset($_GET['dir']) && !empty($_GET['dir'])) {
                return Container::get('upload')->uploads($this->request->file('imgFile'),false,false,$_GET['dir']);
            }
            $data = $this->request->only(['title','stitle','publishtime','en_desc','en_ms','click','desc','id','orders'=>0,'cateid','ist','ms','__token__']);
            $return = $article->setArticle($data,$info, $this->request->file('img'),$this->request->param('publishtime'));
            $return['code'] == 1 ? $this->success('文章操作成功！','admin/article/alist') : $this->error($return['msg']);
        }
        $this->assign(['catelist' => $catelist,'info'=>$info]);
        return $this->fetch();
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
