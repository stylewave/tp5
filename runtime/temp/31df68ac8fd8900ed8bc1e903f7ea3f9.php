<?php /*a:5:{s:64:"F:\xampp\htdocs\yangxing/application/index/view\index\about.html";i:1536299530;s:65:"F:\xampp\htdocs\yangxing/application/index/view\public\style.html";i:1536216986;s:66:"F:\xampp\htdocs\yangxing/application/index/view\public\header.html";i:1536286257;s:65:"F:\xampp\htdocs\yangxing/application/index/view\public\right.html";i:1536226884;s:66:"F:\xampp\htdocs\yangxing/application/index/view\public\footer.html";i:1536228454;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlentities($title['title']); ?> - <?php echo htmlentities($config['title']); ?></title>
    <meta name="keywords" content="<?php echo htmlentities($config['keywords']); ?>" />
    <meta name="description" content="<?php echo htmlentities($config['description']); ?>" />
    <!--[if lt IE 9]>
<script src="/public/static/home/js/html5shiv.min.js"></script>
<script src="/public/static/home/js/respond.min.js.js"></script>
<![endif]-->
<link rel="stylesheet" href="/public/static/home/css/index.css">
<link rel="stylesheet" href="/public/static/home/css/page.css">
<script src="/public/static/home/js/jquery.min.js"></script>
<script src="/public/static/home/js/banner.js"></script>
<script src="/public/static/home/js/jquery.superslide2.js"></script>
</head>
<body>
<style>
    .header .nav .nav-active2::after{
        content: '';
        width: 100%;
        height: 3px;
        background: #006db7;
        position: absolute;
        bottom: 0;
        left: 0;
    }
</style>
<!-- header -->
<div class="warp-nav">
    <header class="header">
        <a href="/"><img class="logo" src="<?php echo htmlentities($config['logo']); ?>" alt=""></a>
        <div class="lang">
            <a href="<?php echo Url::build('/en_index'); ?>"><img src="/public/static/home/images/en.png" alt=""></a>
        </div>
        <ul class="nav">
            <?php $i=0;foreach($nav as $key=>$value): $i++;?>
            <li class="nav-active<?php echo htmlentities($i); ?>">
                <a href="<?php echo Url::build('/'.$value['url']); ?>"><?php echo htmlentities($value['title']); ?></a>
                <dl>
                    <?php foreach($value['dao'] as $ko=>$vo): ?>
                    <dd><a href="<?php echo Url::build('/'.$vo['url']); ?>?id=<?php echo htmlentities($vo['id']); ?>"><?php echo htmlentities($vo['title']); ?></a></dd>
                    <?php endforeach; ?>
                </dl>
            </li>
            <?php endforeach; ?>
        </ul>
    </header>
</div>
<!-- header end --> 
<!-- banner -->
    <?php foreach($banner as $ban): if($ban['cateid'] == 128): ?>
    <section class="page-banner" style="background: url(<?php echo htmlentities(str_replace('\\','/',$ban['img'])); ?>) center no-repeat;">
    <?php endif; endforeach; ?>
        <div class="tit"><?php echo htmlentities($title['title']); ?></div>
        <p><?php echo htmlentities($title['en_title']); ?></p>
    </section>
<!-- banner end -->

<!-- page-main -->
    <div class="page-main">
        <div class="warp">
            <div class="pm-nav">
                <a href="/">首页</a>
                <span>></span>
                <a href="<?php echo Url::build('/'.$title['url']); ?>">走进洋星</a>
                <span>></span>
                <a href="javascript:;"><?php echo htmlentities($data['title']); ?></a>
            </div>
            <section class="pm-left">
                <div class="pl-tit"><?php echo htmlentities($data['title']); ?></div>
                <div class="pl-cont">
                    <?php echo $data['ms']; ?>
                </div>
            </section>
            <aside class="pm-right">
                <dl>
                    <dt>走进洋星</dt>
                    <?php foreach($dao as $d): ?>
                    <dd class="<?php if($data['cateid'] == $d['id']): ?>pr-active<?php endif; ?>"><a href="<?php echo Url::build('/'.$d['url']); ?>?id=<?php echo htmlentities($d['id']); ?>"><?php echo htmlentities($d['title']); ?></a></dd>
                    <?php endforeach; ?>
                </dl>
                <div class="img">
    <img src="/public/static/home/images/about02.png" alt="">
</div>
<div class="bottom">
    <p>CALL:</p>
    <span><?php echo htmlentities($config['tel']); ?></span>
</div>
            </aside>
        </div>
    </div>
<!-- page-main end -->

<!-- footer -->
<footer class="footer">
    <div class="warp">
        <div class="foot-top">
            <dl>
                <dt>关于我们</dt>
                <?php foreach($footer_dao as $about): ?>
                <dd><a href="<?php echo Url::build('/'.$about['url']); ?>?id=<?php echo htmlentities($about['id']); ?>"><?php echo htmlentities($about['title']); ?></a></dd>
                <?php endforeach; ?>
            </dl>
            <dl>
                <dt>业务范围</dt>
                <?php foreach($footer_ye as $about1): ?>
                <dd><a href="<?php echo Url::build('/'.$about1['url']); ?>?id=<?php echo htmlentities($about1['id']); ?>"><?php echo htmlentities($about1['title']); ?></a></dd>
                <?php endforeach; ?>
            </dl>
            <dl>
                <dt>快速链接</dt>
                <?php foreach($nav as $abc): ?>
                <dd><a href="<?php echo Url::build('/'.$abc['url']); ?>"><?php echo htmlentities($abc['title']); ?></a></dd>
                <?php endforeach; ?>
            </dl>
            <dl>
                <dt>关注我们</dt>
                <img src="<?php echo htmlentities($config['img']); ?>" alt="">
                <span>洋星公众号</span>
            </dl>
            <dl class="dz">
                <dt>联系我们</dt>
                <p><?php echo htmlentities($config['address']); ?></p>
                <b><?php echo htmlentities($config['tel']); ?></b>
                <p><?php echo htmlentities($config['email']); ?></p>
            </dl>
        </div>
        <div class="foot-copy">
            <p class="fl"><?php echo htmlentities($config['footer']); ?></p>
            <p class="fr">技术支持：<a href="http://www.yuntianxia.com" target="_blank">云天下</a></p>
        </div>
    </div>
</footer>
<!-- footer end -->
</body>
</html>
