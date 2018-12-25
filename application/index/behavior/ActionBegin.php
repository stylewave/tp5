<?php
namespace app\index\behavior;
use think\Controller;
use app\admin\model\Configs;
class ActionBegin extends controller
{
    public function ActionBegin()
    {
        $config = Configs::getInfo();
        $nav = db('cate')->where(['tid'=>1,'pid'=>0,'ist'=>1])->order(['orders'=>'asc'])->select();
        foreach($nav as $key=>$value){
            $nav[$key]['dao'] = db('cate')->where(['tid'=>1,'pid'=>$value['id'],'ist'=>1])->order(['orders'=>'asc','id'=>'asc'])->select();
        }
        $banner = db('banner')->order(['orders'=>'asc'])->select();
        $footer_dao = db('cate')->where(['pid'=>99])->select();
        $footer_ye = db('cate')->where(['pid'=>95])->select();
        $this->assign([
            'config' => $config,
            'nav' => $nav,
            'banner' => $banner,
            'footer_dao' => $footer_dao,
            'footer_ye' => $footer_ye,
        ]);
    }
}
