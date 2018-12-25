<?php
namespace app\index\controller;
use think\Controller;
use think\Container;
class English extends Controller
{
    public function en_index()
    {
        $list = db('cate')->where(['pid'=>95])->select();//业务范围推荐
        foreach($list as $ko=>$vo){
            $list[$ko]['idao'] = db('article')->where(['cateid'=>$vo['id'],'ist'=>1])->limit(3)->order(['orders'=>'asc','id'=>'desc'])->select();
        }
        $floor_news = db('article')->where('ist',1)->where('cateid','in','119,120')->order(['orders'=>'asc'])->limit(3)->select();//新闻推荐
        $lists = db('article')->where(['cateid'=>121])->order(['orders'=>'asc'])->select();//合作伙伴
        $this->assign([
            'floor_news'=>$floor_news,
            'lists'=>$lists,
            'list'=>$list,
        ]);
        return $this->fetch();
    }
    //走进洋星
    public function en_about()
    {
        $id = $this->request->param('id');
        $id = isset($id)?$id:67;
        $data = db('article')->where(['cateid'=>$id])->find();
        $title = db('cate')->find($id);
        $dao = db('cate')->where(['pid'=>99])->select();
        $this->assign(['data'=>$data,'title'=>$title,'dao'=>$dao]);
        return $this->fetch();
    }
    //走进洋星-荣誉资质
    public function en_about_honor()
    {
        $id = $this->request->param('id');
        $data = db('article')->where(['cateid'=>$id])->find();
        $list = db('article')->where(['cateid'=>$id])->order(['orders'=>'asc'])->select();
        $title = db('cate')->find($id);
        $dao = db('cate')->where(['pid'=>99])->select();
        $this->assign(['data'=>$data,'title'=>$title,'dao'=>$dao,'list'=>$list]);
        return $this->fetch();
    }
    //业务范围
    public function en_business()
    {
        $list = db('cate')->where(['pid'=>95])->select();
        foreach($list as $ko=>$vo){
            $list[$ko]['daos'] = db('article')->where(['cateid'=>$vo['id']])->order(['orders'=>'asc','id'=>'desc'])->paginate(3, false, ['query' => $this->request->param()]);
        }
        $lists = db('article')->where(['cateid'=>121])->order(['orders'=>'asc'])->select();
        $this->assign(['list'=>$list,'lists'=>$lists]);
        return $this->fetch();
    }
    //业务详情
    public function en_business_detail()
    {
        $id = $this->request->param('id');
        $data = db('article')->where('cateid',$id)->find();
        $dao = db('cate')->where(['pid'=>95])->select();
        $detail = db('article')->where('a.cateid',$id)->alias('a')->join('cate b','a.cateid = b.id')->find();
        $this->assign(['data'=>$data,'dao'=>$dao,'detail'=>$detail]);
        return $this->fetch();
    }
    //新闻中心
    public function en_news()
    {
        $id = $this->request->param('id');
        $id = isset($id)?$id:119;
        $data = db('article')->where(['cateid'=>$id])->find();
        $list = db('article')->where(['cateid'=>$id])->order(['orders'=>'asc'])->paginate(6, false, ['query' => $this->request->param()]);
        $title = db('cate')->find($id);
        $dao = db('cate')->where(['pid'=>118])->select();
        $this->assign(['data'=>$data,'title'=>$title,'dao'=>$dao,'list'=>$list]);
        return $this->fetch();
    }
    //新闻详情
    public function en_news_detail()
    {
        $id = $this->request->param('id');
        $data = db('article')->find($id);
        $dao = db('cate')->where(['pid'=>118])->select();
        db('article')->where('id',$id)->update(['click'=>$data['click']+1]);
        $detail = db('article')->where('a.id',$id)->alias('a')->join('cate b','a.cateid = b.id')->find();

        $this->assign(['data'=>$data,'dao'=>$dao,'detail'=>$detail]);
        return $this->fetch();
    }
    //合作伙伴
    public function en_partner()
    {
        $title = db('cate')->field('id,title,en_title,url')->find(121);
        $list = db('article')->where(['cateid'=>121])->order(['orders'=>'asc'])->paginate(18, false, ['query' => $this->request->param()]);
        $this->assign(['title'=>$title,'list'=>$list]);
        return $this->fetch();
    }
    //人力资源
    public function en_human()
    {
        $id = $this->request->param('id');
        $id = isset($id)?$id:123;
        $data = db('article')->where(['cateid'=>$id])->find();
        $title = db('cate')->find($id);
        $dao = db('cate')->where(['pid'=>122])->select();
        $this->assign(['data'=>$data,'title'=>$title,'dao'=>$dao]);
        return $this->fetch();
    }
    //联系我们
    public function en_contact()
    {
        if($this->request->isPost()){
            $info = db('config')->where('id',1)->find();
            $basic = Container::get('basic');
            $table = [
                'title' => input('title'),
                'username' => input('username'),
                'email' => input('email'),
                'content' => input('content'),
                'addtime' => time(),
            ];
            $res = db('message')->insert($table);
            if($res){
                return $basic->rmsg('Submission of success！','1','json');
            }else{
                return $basic->rmsg('Submission failure！','0','json');
            }
        }
        $list = db('store')->select();
        $this->assign(['list'=>$list]);
        return $this->fetch();
    }
}