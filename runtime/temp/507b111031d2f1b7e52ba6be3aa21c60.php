<?php /*a:4:{s:52:"E:\data\8915/application/index/view\index\index.html";i:1539845119;s:53:"E:\data\8915/application/index/view\public\style.html";i:1539661873;s:54:"E:\data\8915/application/index/view\public\header.html";i:1539661659;s:54:"E:\data\8915/application/index/view\public\footer.html";i:1536541715;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlentities($config['title']); ?></title>
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
    .header .nav .nav-active1::after{
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

<header class="header">
    <div class="warp-nav">
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
    </div>
</header>

<!-- header end --> 
<!-- banner -->
    <section class="banner">
        <div class="b-img">
            <!-- <?php foreach($banner as $ban): if($ban['cateid'] == 79): ?>
            <a href="<?php echo htmlentities($ban['url']); ?>" style="background:url(<?php echo htmlentities(str_replace('\\','/',$ban['img'])); ?>) center no-repeat;"></a>
            <?php endif; endforeach; ?> -->
            <a href="javascript:;" style="background:url(/public/static/home/images/ban1.jpg) center no-repeat;"></a>
        </div>
        <div class="b-list"></div>
        <!-- <a class="bar-left" href="#"><em></em></a>
        <a class="bar-right" href="#"><em></em></a>  -->
    </section>
<!-- banner end -->
<!-- product -->
    <section class="index-product">
        <div class="warp">
            <ul>
                <?php foreach($list as $so): foreach($so['idao'] as $sos): ?>
                <li>
                    <div class="img">
                        <img src="<?php echo htmlentities($sos['img']); ?>" alt="">
                        <a href="<?php echo Url::build('/business_detail'); ?>?id=<?php echo htmlentities($sos['cateid']); ?>" class="more">阅读更多</a>
                    </div>
                    <div class="box">
                        <h3><?php echo htmlentities($sos['title']); ?></h3>
                        <p><?php echo htmlentities(getSubstr($sos['desc'],0,48)); ?></p>
                    </div>
                </li>
                <?php endforeach; endforeach; ?>
            </ul>
        </div>
        <div class="ip_more">
            <a href="<?php echo Url::build('/business'); ?>">查看更多</a>
        </div>
    </section>
<!-- product end -->
<!-- 我们的特色 -->
    <section class="index-features">
        <div class="warp">
            <div class="index_tit">
                <div>
                    <h3>我们的特色</h3>
                    <p>定制物流服务</p>
                    <span></span>
                </div>
            </div>
            <ul>
                <li>
                    <div class="img"><img src="/public/static/home/images/features01.png" alt=""></div>
                    <div class="box">
                        <p>经济型海运</p>
                        <span>我们提供全面的海运货运代理服务，拥有来自所有主要船方的优质服务。</span>
                    </div>
                </li>
                <li>
                    <div class="img"><img src="/public/static/home/images/features02.png" alt=""></div>
                    <div class="box">
                        <p>仓储</p>
                        <span>我们提供全面的海运货运代理服务，拥有来自所有主要船方的优质服务。</span>
                    </div>
                </li>
                <li>
                    <div class="img"><img src="/public/static/home/images/features03.png" alt=""></div>
                    <div class="box">
                        <p>当天发货</p>
                        <span>我们提供全面的海运货运代理服务，拥有来自所有主要船方的优质服务。</span>
                    </div>
                </li>
                <li>
                    <div class="img"><img src="/public/static/home/images/features04.png" alt=""></div>
                    <div class="box">
                        <p>包装和储存</p>
                        <span>我们提供全面的海运货运代理服务，拥有来自所有主要船方的优质服务。</span>
                    </div>
                </li>
                <li>
                    <div class="img"><img src="/public/static/home/images/features05.png" alt=""></div>
                    <div class="box">
                        <p>限时交货</p>
                        <span>我们提供全面的海运货运代理服务，拥有来自所有主要船方的优质服务。</span>
                    </div>
                </li>
                <li>
                    <div class="img"><img src="/public/static/home/images/features06.png" alt=""></div>
                    <div class="box">
                        <p>多式联运</p>
                        <span>我们提供全面的海运货运代理服务，拥有来自所有主要船方的优质服务。</span>
                    </div>
                </li>
            </ul>
        </div>
    </section>
<!-- 我们的特色 end -->
<!-- 覆盖范围 -->
    <section class="index-range">
        <div class="warp">
            <h3>覆盖范围</h3>
            <p>我们涵盖不同的行业领域，包括食品和饮料，化工，零售，耐用品等。查看完整列表。</p>
            <img src="/public/static/home/images/range01.png" alt="">
            <dl>
                <dd>包装消费品</dd>
                <dd>化学品</dd>
                <dd>食品与饮品</dd>
                <dd>零售商品</dd>
                <dd>能源，石油和天然气</dd>
            </dl>
        </div>
    </section>
<!-- 覆盖范围 end -->
<!-- 新闻 -->
   <!--  <section class="index-news">
        <div class="in-top">
            <div class="index_tit">
                <div>
                    <h3>新闻中心</h3>
                    <p>定制物流服务</p>
                    <span></span>
                </div>
            </div>
        </div>
        <div class="in-bottom">
            <div class="warp">
                <ul>
                    <?php foreach($floor_news as $li): ?>
                    <li>
                        <div class="img">
                            <a href="<?php echo Url::build('/news_detail'); ?>?id=<?php echo htmlentities($li['id']); ?>"><img src="<?php echo htmlentities($li['img']); ?>" alt=""></a>
                        </div>
                        <div class="box">
                            <span><?php echo htmlentities(date('Y年m月d日',!is_numeric($li['publishtime'])? strtotime($li['publishtime']) : $li['publishtime'])); ?></span>
                            <a href=""><h3><?php echo htmlentities($li['title']); ?></h3></a>
                            <p><?php echo htmlentities(getSubstr($li['desc'],0,48)); ?></p>
                            <a href="<?php echo Url::build('/news_detail'); ?>?id=<?php echo htmlentities($li['id']); ?>" class="more">阅读更多</a>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section> -->
<!-- 新闻 end -->
<!-- 合作伙伴 -->
    <section class="index-partner">
        <div class="warp">
            <div class="mr_frbox">
                <img class="mr_frBtnL prev" src="/public/static/home/images/mfrl.gif" />
                <div class="mr_frUl">
                    <ul id="mr_fu">
                        <?php foreach($lists as $lg): ?>
                        <li>
                            <a href="javascript:void(0);"><img src="<?php echo htmlentities($lg['img']); ?>" /></a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <img class="mr_frBtnR next" src="/public/static/home/images/mfrr.gif" />
            </div>
        </div>
    </section>
<!-- 合作伙伴 end -->
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
<script>
    $(".mr_frbox").slide({
        titCell: "",
        mainCell: ".mr_frUl ul",
        autoPage: true,
        effect: "leftLoop",
        autoPlay: true,
        vis: 6
    });
</script>
