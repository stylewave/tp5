<?php
/*
 * 1.管理栏目
 * 最多三级，1级key代表 控制器名称 比如 Rbac,如果只有2级，1级key下面的menu下的key就代表控制器方法，如果三级，二级key下面的menu下的menu的key才是对应的控制器方法
 *
 * 2.数组解析
 * title 栏目标题
 * inco 栏目图标,二级栏目 inco 默认是fa-circle 三级栏目默认是fa-circle-o 所有图标网址 /admin/index/tubiao.html
 * pre 代表是否加入权限控制，除后台首页外，其他默认都加入，如果一级pre为false，二级pre设置为true失效，一级为true 二级为false有效 三级同样
 * isshow 隐形的权限判断，比如删除或者AJAX进行某些操作，或者其他权限判断，不会显示在左边控制栏，但是会判断权限
 * isshow 只有最后一级才起作用，比如2级，就只能加到二级栏目里，如果是三级，只有加到三级栏目才起作用
 *
 * 3.修改权限
 * 默认和添加权限等同，有添加权限，即有修改权限。如果要分开，请把修改和添加分开2个控制器方法
 * */

$admin_menus = [
    //系统设置
    'System' => [
        'title' => '系统设置',
        'inco'  => ' fa-cogs',
        'pre'   => true,
        'menu'  =>[
            'index' => ['title'=>'网站设置', 'inco'=>'fa-circle', 'pre'=>true, 'isshow'=>true],
            'friendlist' => ['title'=>'友情链接', 'inco'=>'fa-circle', 'pre'=>true, 'isshow'=>true],
            'friend' => ['title'=>'添加友情链接', 'inco'=>'fa-circle', 'pre'=>true, 'isshow'=>true],
//            'partner' => ['title'=>'合作客户', 'inco'=>'fa-circle', 'pre'=>true, 'isshow'=>true],
        ]
    ],
    'Seo' => [
        'title' => 'seo设置',
        'inco'  => ' fa-tv',
        'pre'   => true,
        'menu'  =>[
            'seolist' => ['title'=>'网站seo', 'inco'=>'fa-circle', 'pre'=>true, 'isshow'=>true],
            'seo' => ['title'=>'添加网站seo', 'inco'=>'fa-circle', 'pre'=>true, 'isshow'=>true],
        ]
    ],
    //权限组 三级管理栏目示例
    'Rbac' => [
        'title' => '权限管理',
        'inco'  => 'fa-male',
        'pre'   => true,
        'menu'  =>[
            [
                'title'=>'权限组管理',
                'inco'=>'fa-circle',
                'pre'=>true,
                'menu'=>[
                    'rbacList' => ['title'=>'权限组列表', 'inco'=>'fa-circle-o', 'pre'=>true, 'isshow'=>true],
                    'addRbac' =>  ['title'=>'添加权限组', 'inco'=>'fa-circle-o', 'pre'=>true, 'isshow'=>true],
                    'delRbac' =>  ['title'=>'删除权限组', 'inco'=>'fa-circle-o', 'pre'=>true, 'isshow'=>false],
                ]
            ],
            [
                'title'=>'权限组成员管理',
                'inco'=>'fa-circle',
                'pre'=>true,
                'menu'=>[
                    'userList' => ['title'=>'权限成员列表', 'inco'=>'fa-circle-o', 'pre'=>true, 'isshow'=>true],
                    'addUser' =>  ['title'=>'添加成员', 'inco'=>'fa-circle-o', 'pre'=>true, 'isshow'=>true],
                    'delUser' =>  ['title'=>'删除成员', 'inco'=>'fa-circle-o', 'pre'=>true, 'isshow'=>false],
                ]
            ],
        ]
    ],
    //分类管理 二级管理栏目示例
    'Cate' => [
        'title' => '分类管理',
        'inco'  => 'fa-briefcase',
        'pre'   => true,
        'menu'  => [
            [
                'title'=>'分类类别管理',
                'inco'=>'fa-circle',
                'pre'=>true,
                'menu'=>[
                    'typeList' => ['title'=>'类别列表', 'inco'=>'fa-circle-o', 'pre'=>true, 'isshow'=>true],
                    'addType' =>  ['title'=>'添加类别', 'inco'=>'fa-circle-o', 'pre'=>true, 'isshow'=>true],
                    'delType' =>  ['title'=>'删除类别', 'inco'=>'fa-circle-o', 'pre'=>true, 'isshow'=>false],
                ]
            ],
            [
                'title'=>'分类管理',
                'inco'=>'fa-circle',
                'pre'=>true,
                'menu'=>[
                    'cateList' => ['title'=>'分类列表', 'inco'=>'fa-circle-o', 'pre'=>true, 'isshow'=>true],
                    'addCate' =>  ['title'=>'添加分类', 'inco'=>'fa-circle-o', 'pre'=>true, 'isshow'=>true],
                    'delCate' =>  ['title'=>'删除分类', 'inco'=>'fa-circle-o', 'pre'=>true, 'isshow'=>false],
                    'ajaxCate' =>  ['title'=>'分类推荐排序', 'inco'=>'fa-circle-o', 'pre'=>true, 'isshow'=>false],
                ]
            ],
        ]
    ],
    //产品管理
    'Product' => [
        'title' => '产品管理',
        'inco'  => ' fa-cubes',
        'pre'   => true,
        'menu'  =>[
            'aList' => ['title'=>'产品列表', 'inco'=>'fa-circle', 'pre'=>true, 'isshow'=>true],
            'add' => ['title'=>'添加产品', 'inco'=>'fa-circle', 'pre'=>true, 'isshow'=>true],
            'delProduct' =>  ['title'=>'删除产品', 'inco'=>'fa-circle', 'pre'=>true, 'isshow'=>false],
            'ajaxProduct' =>  ['title'=>'产品推荐排序', 'inco'=>'fa-circle', 'pre'=>true, 'isshow'=>false],
        ]
    ],
    //文章管理
    'Article' => [
        'title' => '文章管理',
        'inco'  => ' fa-book',
        'pre'   => true,
        'menu'  =>[
            'aList' => ['title'=>'文章列表', 'inco'=>'fa-circle', 'pre'=>true, 'isshow'=>true],
            'add' => ['title'=>'添加文章', 'inco'=>'fa-circle', 'pre'=>true, 'isshow'=>true],
            'delArticle' =>  ['title'=>'删除文章', 'inco'=>'fa-circle', 'pre'=>true, 'isshow'=>false],
            'ajaxArticle' =>  ['title'=>'文章推荐排序', 'inco'=>'fa-circle', 'pre'=>true, 'isshow'=>false],
        ]
    ],
    //banner图管理
    'Banner' => [
        'title' => '图片管理',
        'inco'  => ' fa-image',
        'pre'   => true,
        'menu'  =>[
            'bannerlist' => ['title'=>'图片列表', 'inco'=>'fa-circle', 'pre'=>true, 'isshow'=>true],
            'banner' => ['title'=>'添加图片', 'inco'=>'fa-circle', 'pre'=>true, 'isshow'=>true],
        ]
    ],
    //人才招聘
    'Recruit' => [
        'title' => '招聘管理',
        'inco'  => ' fa-mortar-board',
        'pre'   => true,
        'menu'  =>[
            'recruitlist' => ['title'=>'招聘岗位', 'inco'=>'fa-circle', 'pre'=>true, 'isshow'=>true],
            'recruit' => ['title'=>'添加招聘岗位', 'inco'=>'fa-circle', 'pre'=>true, 'isshow'=>true],
            'commentlist' => ['title'=>'申请列表', 'inco'=>'fa-circle', 'pre'=>true, 'isshow'=>true],
        ]
    ],
    //留言管理
    'Message' => [
        'title' => '留言管理',
        'inco'  => ' fa-commenting',
        'pre'   => true,
        'menu'  =>[
            'messagelist' => ['title'=>'留言列表', 'inco'=>'fa-circle', 'pre'=>true, 'isshow'=>true],
        ]
    ],
    //    //统计管理
    'Stat' => [
        'title' => '统计管理',
        'inco'  => ' fa-line-chart',
        'pre'   => true,
        'menu'  =>[
            'statList' => ['title'=>'访问统计', 'inco'=>'fa-circle', 'pre'=>true, 'isshow'=>true],
        ]
    ],
    //日志管理
    'Log' => [
        'title' => '操作日志管理',
        'inco'  => 'fa-minus-square-o',
        'pre'   => true,
        'menu'  =>[
            'Loglist' => ['title'=>'日志列表', 'inco'=>'fa-circle', 'pre'=>true, 'isshow'=>true],
        ]
    ],
];

?>