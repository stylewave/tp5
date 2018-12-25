<?php
namespace app\admin\validate;
use think\Validate;
use think\Container;

//文章验证器

class Article extends Validate
{
    //共用验证器
    protected $rule =   [
        '__token__'=>'token',
        'title|ms'=>'require',
        'cateid' => 'checkCateid'
    ];
    //验证分类ID
    protected function checkCateid($value, $rule, $data=[]) {
        $info = Container::get('cate')->getCateCache('cate',Container::get('article')->getAtid(),$value);
        return empty($info)?'分类不存在':true;
    }
    // 添加文章
    public function sceneAdd()
    {
        return $this->append('title', 'unique:article');
    }
    protected $message  =   [
        'title.require' => '文章标题必须',
        'title.unique' => '文章已经存在了',
        'ms.require' => '文章内容必须',
    ];
}
