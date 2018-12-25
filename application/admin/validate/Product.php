<?php
namespace app\admin\validate;
use think\Validate;
use think\Container;
use think\Db;
//产品验证器

class Product extends Validate
{
    //共用验证器
    protected $rule =   [
        '__token__'=>'token',
        'title|description|content'=>'require',
        'cateid' => 'checkCateid'
    ];
    //验证分类ID
    protected function checkCateid($value, $rule, $data=[]) {
        $info = Container::get('cate')->getCateCache('cate',Container::get('product')->getPtid(),$value);
        return empty($info)?'分类不存在':true;
    }
    // 添加产品
    public function sceneAdd()
    {
        return $this->append('title', 'unique:product');
    }
    protected $message  =   [
        'title.require' => '产品标题必须',
        'title.unique' => '产品已经存在了',
        'description.require' => '产品描述必须',
        'content.require' => '产品内容必须',
    ];

}
