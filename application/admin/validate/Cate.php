<?php
namespace app\admin\validate;
use think\Validate;

//分类验证

class Cate extends Validate
{
    protected $rule =   [
          '__token__'=>'token',
          'title'=>'require'
    ];



    // 添加分类类别
    public function sceneAddtype()
    {
        return $this->append('title','unique:cate_type');
    }

    //增加分类验证器
    public function sceneAddcate()
    {
        return $this->append('orders|pid','egt:0')
            ->append('tid','gt:0');
    }

    //修改分类验证器
    public function sceneEditcate()
    {
        return $this->append('orders|tid|pid|id', 'require')
            ->append('username','unique:admin_user')
            ->append('rpass','confirm:pass')
            ->append('id','different:pid')
            ->append('pre','integer');
    }



    protected $message  =   [
        'title.require' => '名称必须',
        'title.unique' => '名称已存在了',
        'order.egt' => '排序必须大于等于0',
        'pid.egt' => '请选择上级分类',
        'tid.gt' => '必须选择分类类别',
        'id.different' => '不能选择自己作为上级分类',
    ];



}
