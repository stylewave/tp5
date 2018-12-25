<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Logs;
use think\Container;
use app\admin\model\Users;

class Log extends controller
{
    //后台用户日志列表
    public function logList()
    {
        $usermodel = new Logs;
        $list = $usermodel->getAllLog($this->getSelectW());
        $this->assign([
            'list'    => $list,
            'logtype' => $this->getLogType(),
        ]);
        if($this->request->isPjax()) {
            Container::get('config')->set('default_ajax_return', 'html');
            return $this->fetch('logList_pjax');
        } else {
            //加载所有用户列表 1000个用户
            $users = new Users;
            $this->assign('alluser', $users->getAllUser(Container::get('user')->init('admin'), 1000));
            return $this->fetch();
        }
    }


    //日志类型
    private function getLogType() {
        return [
            0 => '登录日志',
            1 => '操作日志',
            2 => '权限操作日志',
            3 => '退出日志'
        ];
    }


    //组合查询条件
    private function getSelectW() {
        $data = [
            'addtime' => [
                'keys' => ['starttime', 'endtime'],
                'default' => 'all',
                'exp' => 'between',
                'fun' => 'trim',
            ],
            'uid' => [
                'keys' => 'uid',
                'default' => 0,
                'exp' => '=',
                'fun' => 'intval',
            ],
            'type' => [
                'keys' => 'type',
                'default' => -1,
                'exp' => '=',
                'fun' => 'intval',
            ],
        ];
        return Container::get('basic')->getSelectWhere($this->request->param(), $data);
    }

}
