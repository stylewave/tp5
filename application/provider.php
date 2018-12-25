<?php
return [
    'user'       => \user\User::class,//后台用户权限逻辑类
    'basic'      => \basic\Basic::class,//一些共用方法逻辑类
    'rbac'       => \rbac\Rbac::class,//后台RBAC权限控制逻辑类
    'cate'       => \cate\Cate::class,//分类逻辑类
    'article'    => \article\Article::class,//文章逻辑类
    'upload'     => \basic\Upload::class,//上传逻辑类
    'product'    => \product\Product::class,//产品逻辑类
    'banner'     => \banner\Banner::class,//图片逻辑类
    'store'       => \store\Store::class,//门店逻辑类
];

