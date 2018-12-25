<?php /*a:5:{s:69:"F:\xampp\htdocs\yangxing/application/index/view\english\en_about.html";i:1536306702;s:66:"F:\xampp\htdocs\yangxing/application/index/view\public\styles.html";i:1536285306;s:69:"F:\xampp\htdocs\yangxing/application/index/view\public\en_header.html";i:1536286250;s:65:"F:\xampp\htdocs\yangxing/application/index/view\public\right.html";i:1536226884;s:69:"F:\xampp\htdocs\yangxing/application/index/view\public\en_footer.html";i:1536290326;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta  charset="UTF-8">
    <title><?php echo htmlentities($title['en_title']); ?> - <?php echo htmlentities($config['en_name']); ?></title>
    <meta name="keywords" content="<?php echo htmlentities($config['keywords']); ?>" />
    <meta name="description" content="<?php echo htmlentities($config['description']); ?>" />
    <!--[if lt IE 9]>
<script src="/public/static/english/js/html5shiv.min.js"></script>
<script src="/public/static/english/js/respond.min.js.js"></script>
<![endif]-->
<link rel="stylesheet" href="/public/static/english/css/index.css">
<link rel="stylesheet" href="/public/static/english/css/page.css">
<script src="/public/static/english/js/jquery.min.js"></script>
<script src="/public/static/english/js/banner.js"></script>
<script src="/public/static/english/js/jquery.superslide2.js"></script>
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
        <a href="<?php echo Url::build('/en_index'); ?>"><img class="logo" src="<?php echo htmlentities($config['logo']); ?>" alt=""></a>
        <div class="lang">
            <a href="/"><img src="/public/static/home/images/cn.png" alt=""></a>
        </div>
        <ul class="nav">
            <?php $i=0;foreach($nav as $key=>$value): $i++;?>
            <li class="nav-active<?php echo htmlentities($i); ?>">
                <a href="<?php echo Url::build('/'.$value['en_url']); ?>"><?php echo htmlentities($value['en_title']); ?></a>
                <dl>
                    <?php foreach($value['dao'] as $ko=>$vo): ?>
                    <dd><a href="<?php echo Url::build('/'.$vo['en_url']); ?>?id=<?php echo htmlentities($vo['id']); ?>"><?php echo htmlentities($vo['en_title']); ?></a></dd>
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
        <div class="tit"><?php echo htmlentities($title['en_title']); ?></div>
        <p>About us</p>
    </section>
<!-- banner end -->

<!-- page-main -->
    <div class="page-main">
        <div class="warp">
            <div class="pm-nav">
                <a href="<?php echo Url::build('/en_index'); ?>">Home</a>
                <span>></span>
                <a href="<?php echo Url::build('/'.$title['en_url']); ?>">About</a>
                <span>></span>
                <a href="javascript:;"><?php echo htmlentities($title['en_title']); ?></a>
            </div>
            <section class="pm-left">
                <div class="pl-tit"><?php echo htmlentities($data['stitle']); ?></div>
                <div class="pl-cont">
                    <p><?php echo $data['en_ms']; ?></p>
                </div>
            </section>
            <aside class="pm-right">
                <dl>
                    <dt>About</dt>
                    <?php foreach($dao as $d): ?>
                    <dd class="<?php if($data['cateid'] == $d['id']): ?>pr-active<?php endif; ?>"><a href="<?php echo Url::build('/'.$d['en_url']); ?>?id=<?php echo htmlentities($d['id']); ?>"><?php echo htmlentities($d['en_title']); ?></a></dd>
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
                <dt>About</dt>
                <?php foreach($footer_dao as $about): ?>
                <dd><a href="<?php echo Url::build('/'.$about['en_url']); ?>?id=<?php echo htmlentities($about['id']); ?>"><?php echo htmlentities($about['en_title']); ?></a></dd>
                <?php endforeach; ?>
            </dl>
            <dl style="width: 300px">
                <dt>Scope of Business</dt>
                <?php foreach($footer_ye as $about1): ?>
                <dd><a href="<?php echo Url::build('/'.$about1['en_url']); ?>?id=<?php echo htmlentities($about1['id']); ?>"><?php echo htmlentities($about1['en_title']); ?></a></dd>
                <?php endforeach; ?>
            </dl>
            <dl style="width: 170px">
                <dt>Fast Link</dt>
                <?php foreach($nav as $abc): ?>
                <dd><a href="<?php echo Url::build('/'.$abc['en_url']); ?>"><?php echo htmlentities($abc['en_title']); ?></a></dd>
                <?php endforeach; ?>
            </dl>
            <dl style="width: 180px">
                <dt>Pay attention to us</dt>
                <img src="<?php echo htmlentities($config['img']); ?>" alt="">
                <span style="padding-left:0;">YangXing Subscription</span>
            </dl>
            <dl class="dz">
                <dt>Contact</dt>
                <p><?php echo htmlentities($config['addr']); ?></p>
                <b><?php echo htmlentities($config['tel']); ?></b>
                <p><?php echo htmlentities($config['email']); ?></p>
            </dl>
        </div>
        <div class="foot-copy">
            <p class="fl"><?php echo htmlentities($config['en_footer']); ?></p>
            <p class="fr">Technical support：<a href="http://www.yuntianxia.com" target="_blank">YunTianXia</a></p>
        </div>
    </div>
</footer>
<!-- footer end -->
</body>
</html>
