<?php
namespace app\admin\controller;
use think\Container;
use think\Controller;
use think\Exception;


class Cate extends controller
{

    //分类列表
    public function cateList() {
        $tid = $this->request->param('tid',0,'intval');
        $cate = Container::get('cate');
        $tall = $cate->getCateCache();
        $tid = $tid>0?$tid:key($tall);
        $tinfo = $tall[$tid];
        if(empty($tinfo)) $this->error('分类类别不存在！');
        $alldata = $cate->getCateCache('cate',$tid,false,'tree');
        if($alldata === false) $this->error('缓存错误！');
        if(!empty($alldata)) {
            //筛选
            $basic = Container::get('basic');
            $sx = [
                'cateid' => [
                    'keys' => 'cateid',
                    'default' => 0,
                    'exp' => '=',
                    'fun' => 'intval',
                ],
                'tid' => [
                    'keys' => 'tid',
                    'default' => $tid,
                    'exp' => '=',
                    'fun' => 'intval',
                ],
            ];
            $w = $basic->getSelectWhere($this->request->param(),$sx);
            $cateid = $w['pagearr']['cateid'];
            if($cateid > 0) {
                $alldata = $cate->getSonCate($alldata,$cateid);
            }
            if(!empty($alldata)) {
                $data = $basic->pages($alldata, $w,'admin/Cate/cateList',['order']);
            } else {
                $data = ['data'=>[],'page'=>''];
            }
        } else {
            $data = ['data'=>[],'page'=>''];
        }
        $this->assign([
            'list' => $alldata,
            'lists' => $data,
            'tall' => $tall,
            'tinfo'=> $tinfo,
        ]);
        if($this->request->isPjax()) {
            Container::get('config')->set('default_ajax_return', 'html');
            return $this->fetch('cateList_pjax');
        } else {
            return $this->fetch();
        }
    }

    //分类操作，目前排序和推荐
    public function ajaxCate() {
        $id = $this->request->param('id',0,'intval');
        $tid = $this->request->param('tid',0,'intval');
        $do = $this->request->param('do','','trim');
        if(!in_array($do, ['tj','qxtj','order'])) exit('error');
        if($this->request->isAjax()) {
            $basic = Container::get('basic');
            try{
                $cate = Container::get('cate');
                $info = $cate->getCateCache('cate',$tid,$id);
                if(empty($info)) throw new \Exception('操作的分类不存在！');
                $r= [];
                switch ($do) {
                    case 'tj':
                        $r = $cate->ajaxCate($info,'ist', 1);
                        break;
                    case 'qxtj':
                        $r = $cate->ajaxCate($info,'ist', 0);
                        break;
                    case 'order':
                        $order = $this->request->param('order',0,'intval');
                        $r = $cate->ajaxCate($info,'orders', $order);
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

    //添加分类
    public function addCate()
    {
        $id = $this->request->param('id',0,'intval');
        $tid = $this->request->param('tid',0,'intval');
        $cate = Container::get('cate');
        $leibie = $cate->getCateCache();
        $info = $cate->getCateCache('cate',$tid,$id);
        //ajax start
        if($this->request->isAjax()) {
            $basic = Container::get('basic');
            if(isset($leibie[$tid]) && !empty($leibie[$tid])) {
                $cates = $cate->getCateCache('cate',$tid,false,'tree');
                $str = '<select class="form-control select5" style="width: 50%;" name="pid" id="pid">
                        <option selected="selected" value="0" >顶级分类</option>';
                if(!empty($cates)) {
                    foreach($cates as $key=>$value) {
                        //干掉自己
                        if($value['id'] == $info['pid']) {
                            $set = 'selected';
                        } else {
                            $set = '';
                        }
                        if($value['dj'] > 0){
                            $qz = str_repeat(" L__ ",$value['dj'])." ";
                        } else {
                            $qz = '';
                        }
                        $str .= '<option value="'.$value['id'].'" '.$set.'>'.$qz.$value['title'].'</option>';
                    }
                }
                $str .= '</select>';
                return $basic->rmsg($str,1,'json');
            }
            return $basic->rmsg('错误：没有找到类别！',0,'json');
        }
        //ajax end

        if(empty($leibie)) $this->error('请先添加类别！');
        if($this->request->isPost()) {
            $tinfo = $leibie[$tid];
            if(empty($tinfo))  $this->error('类别错误！');
            $data = $this->request->only(['title','en_title','url','en_url','cat_desc','en_cat_desc','orders', 'tid', 'pid', 'id', 'ist', '__token__']);
            $cj = empty($info) ? 'addcate' : ($info['title'] != $data['title']) ? 'addcate' : 'editcate';//验证器场景
            $r = $this->validate($data,'app\admin\validate\Cate.'.$cj);
            if(true !== $r) $this->error($r);
            $return = $cate->setCate($data,$info,$this->request->file('img'));
            $return['code'] == 1 ? $this->success('操作分类成功！','admin/Cate/cateList') : $this->error($return['msg']);
        }
        $this->assign([
            'info'=>$info,
            'leibie'=>$leibie
        ]);
        return $this->fetch();
    }

    //删除分类
    public function delCate() {
        $id = $this->request->get('id',0,'intval');
        $tid = $this->request->get('tid',0,'intval');
        $cate = Container::get('cate');
        $r = $cate->delCate($id,$tid,'product','id','分类');
        if(true !== $r) $this->error($r);
        $this->success('分类删除成功！');
    }



    //类别首页
    public function typeList()
    {
        $cate = Container::get('cate');
        $list = $cate->getCateCache();
        $this->assign('list', $list);
        return $this->fetch();
    }


    //添加类别
    public function addType()
    {
        $id = $this->request->param('id',0,'intval');
        $cate = Container::get('cate');
        $info = $id>0?$cate->getCateCache('type',false,$id):[];
        if($info && $info['hexin'] == 1) $this->error('核心类别，不能编辑！');
        if($this->request->isPost()) {
            $data = $this->request->only(['title','__token__']);
            $cj = empty($info) ? 'addtype' : ($info['title'] != $data['title']) ? 'addtype' : '';//验证器场景
            $r = $this->validate($data,'app\admin\validate\Cate.'.$cj);
            if(true !== $r) $this->error($r);
            $return = $cate->setCateType($data,$info);
            $return['code'] == 1 ? $this->success('操作分类类别成功！','admin/Cate/typeList') : $this->error($return['msg']);
        }
        $this->assign(['info'=>$info]);
        return $this->fetch();
    }

    //删除类别
    public function delType() {
        $id = $this->request->get('id',0,'intval');
        $cate = Container::get('cate');
        $r = $cate->delType($id);
        if(true !== $r) $this->error($r);
        $this->success('类别删除成功！');
    }

}
