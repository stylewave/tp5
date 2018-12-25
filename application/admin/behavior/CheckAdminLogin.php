<?php
namespace app\admin\behavior;

use think\Controller;
use think\Container;

class CheckAdminLogin extends controller
{


    public function ActionBegin()
    {
    
        try{
           
            //检查是否登录
            $user = Container::get('user')->init('admin');
           
            if(!$user->checklogin()) throw new \Exception('nologin');
          //  echo 111;die;
            $uid = $user->getUser();
            if($uid > 0) {
                $cname = $this->request->controller();
                $aname = strtolower($this->request->action());
                
                //检查用户是否被删除
                if(!$user->checkUserDel($uid))  throw new \Exception('delete');
                //检查用户权限
                $rbac = Container::get('rbac');
                if(!$nowrbac = $rbac->checkUserRbac($uid, $cname, $aname))  throw new \Exception('对不起，您没有权限进行此操作！');

                //加载menu
                $retm = $rbac->getMenu($nowrbac);
                
                $this->assign([
                    'dqlujing'   => $rbac->getDqLujing($retm, $cname, $aname),
                    'returnarr'  => $retm,
                    'controname' => $cname,
                    'actionname' => $aname
                ]);

            }
        }catch (\Exception $e) {
            $errmsg = $e->getMessage();
            switch ($errmsg) {
                case 'nologin':
                    $this->error('请先登录！',"admin/Index/login");
                    break;
                case 'delete':
                    $this->error('当前用户已经被删除，请重新登录！',"admin/Index/login");
                    break;
                default:
                    $this->error($errmsg);
            }
        }
    }




}
