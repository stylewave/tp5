<?php
namespace app\admin\controller;
use think\Controller;
use think\Container;
use think\Db;

class Index extends controller
{
    //首页 |raw
    public function index()
    {
       
        $info = [
//            ['name'=>'操作系统','value'=>php_uname()],
                ['name'=>'操作系统','value'=>PHP_OS],
            ['name'=>'运行环境','value'=>$_SERVER["SERVER_SOFTWARE"]],
            ['name'=>'PHP运行方式','value'=>php_sapi_name()],
            ['name'=>'PHP版本','value'=>PHP_VERSION],
            ['name'=>'Zend版本','value'=>zend_version()],
            ['name'=>'服务器最大上传','value'=>ini_get('upload_max_filesize')],
            ['name'=>'PHP最大执行时间','value'=>ini_get('max_execution_time').'秒'],
            ['name'=>'服务器当前时间','value'=>date("Y年n月j日 H:i:s")],
            ['name'=>'服务器域名/IP','value'=>$_SERVER['SERVER_NAME'].' [ '.gethostbyname($_SERVER['SERVER_NAME']).' ]'],
//            ['name'=>'服务器剩余空间','value'=>round((disk_free_space(".")/(1024*1024*1024)),2).'G'],
        ];
        $this->assign('serverinfo', $info);
        $userinfo = Container::get('user')->init('admin')->getUser('info');
        if($userinfo['pre'] == -1) {
            $qxzname = '超级管理员';
        } else {
            $qxlist = Container::get('rbac')->getsetRbCache();
            $qxzname = $qxlist[$userinfo['pre']]['title'];
        }
        $this->assign('qxznickname', $qxzname);
        return $this->fetch();
    }


    //隐藏页，图标
    public function tubiao()
    {
        return $this->fetch();
    }


    //设置主题
    public function setSkin() {
        if($this->request->isAjax()) {
            $basic = Container::get('basic');
            $user = Container::get('user')->init('admin');
            $uid = $user->getUser();
            $skins = ['skin-blue','skin-purple','skin-yellow','skin-red','skin-green'];
            $skin = $this->request->post('skin');
            if(!in_array($skin,$skins)) return $basic->rmsg('参数错误！',0,'json');
            if($uid>0){
                try{
                    Db::startTrans();
                    $res = Db::name('admin_user')->where("id",$uid)->setField("skin",$skin);
                    if(!$res) throw new \Exception('更新用户信息失败，请刷新页面重试！');
                    $res = $user->setUserLog(1,'更换后台主题'.$skin);
                    if(!$res) throw new \Exception('记录日志失败，请刷新页面重试！');
                    Db::commit();
                    $user->setUserSession();
                    return $basic->rmsg('ok！',1,'json');
                }catch (\Exception $e) {
                    Db::rollback();
                    return $basic->rmsg($e->getMessage(),0,'json');
                }
            }
            return $basic->rmsg('主题更换失败，请刷新页面重试！',0,'json');
        } else {
            $this->error('错误的请求！');
        }
    }


    //退出登录
    public function loginout() {
        Container::get('user')->init('admin')->loginout();
        $this->success('退出登录成功！','admin/Index/login');
    }

    //登录
    public function login() {
        if(Container::get('user')->init('admin')->checklogin('login')) $this->success('您已登录！','admin/Index/index');
        if($this->request->isPost()) {
            $result = $this->validate($this->request->only(['username','pass','code']),'app\admin\validate\Admin');
            $data = ['code'=>0,'msg'=>''];
            true !== $result ? $data['msg'] = $result : $data['code'] = 1;
            return Container::get('response')->create($data, 'json');
        }
        $this->view->engine->layout(false);
        return $this->fetch();
    }

}
