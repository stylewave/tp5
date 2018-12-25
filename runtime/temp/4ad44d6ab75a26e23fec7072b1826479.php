<?php /*a:4:{s:58:"/opt/www/8915/application/index/view/english/en_index.html";i:1539845126;s:55:"/opt/www/8915/application/index/view/public/styles.html";i:1539661874;s:58:"/opt/www/8915/application/index/view/public/en_header.html";i:1539662027;s:58:"/opt/www/8915/application/index/view/public/en_footer.html";i:1539662026;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlentities($config['en_name']); ?></title>
    <meta name="keywords" content="<?php echo htmlentities($config['keywords']); ?>" />
    <meta name="description" content="<?php echo htmlentities($config['description']); ?>" />
    <!--[if lt IE 9]>
<script src="/public/static/english/js/html5shiv.min.js"></script>
<script src="/public/static/english/js/respond.min.js.js"></script>
<![endif]-->
<link rel="stylesheet" href="/public/static/english/css/index.css">
<link rel="stylesheet" href="/public/static/english/css/page.css">
<script src="/public/static/english/js/jquery.min.js"></script>
<!-- <script src="/public/static/english/js/banner.js"></script> -->
<script src="/public/static/english/js/jquery.superslide2.js"></script>
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
    </div>
</header>

<!-- header end --> 
<!-- banner -->
    <section class="banner">
        <div class="b-img">
            <!-- <?php foreach($banner as $ban): if($ban['cateid'] == 79): ?>
            <a href="<?php echo htmlentities($ban['url']); ?>" style="background:url(<?php echo htmlentities(str_replace('\\','/',$ban['img'])); ?>) center no-repeat;"></a>
            <?php endif; endforeach; ?> -->
            <a href="javascript:;" style="background:url(/public/static/home/images/ban_en1.jpg) center no-repeat;"></a>
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
                        <a href="<?php echo Url::build('/en_business_detail'); ?>?id=<?php echo htmlentities($sos['cateid']); ?>" class="more">Read more</a>
                    </div>
                    <div class="box">
                        <h3><?php echo htmlentities($sos['stitle']); ?></h3>
                        <p><?php echo htmlentities(getSubstr($sos['en_desc'],0,110)); ?></p>
                    </div>
                </li>
                <?php endforeach; endforeach; ?>
            </ul>
        </div>
        <div class="ip_more">
            <a href="<?php echo Url::build('/en_business'); ?>">More</a>
        </div>
    </section>
<!-- product end -->
<!-- 我们的特色 -->
    <section class="index-features">
        <div class="warp">
            <div class="index_tit">
                <div>
                    <h3>Our characteristics</h3>
                    <p>Customized logistics service</p>
                    <span></span>
                </div>
            </div>
            <ul>
                <li>
                    <div class="img"><img src="/public/static/home/images/features01.png" alt=""></div>
                    <div class="box">
                        <p>Economic shipping</p>
                        <span>We provide a comprehensive ocean freight forwarding service with excellent service from all major ships.</span>
                    </div>
                </li>
                <li>
                    <div class="img"><img src="/public/static/home/images/features02.png" alt=""></div>
                    <div class="box">
                        <p>Storage</p>
                        <span>We provide a comprehensive ocean freight forwarding service with excellent service from all major ships.</span>
                    </div>
                </li>
                <li>
                    <div class="img"><img src="/public/static/home/images/features03.png" alt=""></div>
                    <div class="box">
                        <p>Delivery on the day</p>
                        <span>We provide a comprehensive ocean freight forwarding service with excellent service from all major ships.</span>
                    </div>
                </li>
                <li>
                    <div class="img"><img src="/public/static/home/images/features04.png" alt=""></div>
                    <div class="box">
                        <p>Packaging and storage</p>
                        <span>We provide a comprehensive ocean freight forwarding service with excellent service from all major ships.</span>
                    </div>
                </li>
                <li>
                    <div class="img"><img src="/public/static/home/images/features05.png" alt=""></div>
                    <div class="box">
                        <p>Time limit delivery</p>
                        <span>We provide a comprehensive ocean freight forwarding service with excellent service from all major ships.</span>
                    </div>
                </li>
                <li>
                    <div class="img"><img src="/public/static/home/images/features06.png" alt=""></div>
                    <div class="box">
                        <p>Multimodal transport</p>
                        <span>We provide a comprehensive ocean freight forwarding service with excellent service from all major ships.</span>
                    </div>
                </li>
            </ul>
        </div>
    </section>
<!-- 我们的特色 end -->
<!-- 覆盖范围 -->
    <section class="index-range">
        <div class="warp">
            <h3>Coverage Range</h3>
            <p>We cover different industries, including food and beverage, chemical, retail, durable goods, etc. View the complete list.</p>
            <img src="/public/static/home/images/range01.png" alt="">
            <dl>
                <dd>Packaged consumer goods</dd>
                <dd>Chemical</dd>
                <dd>Food and drinks</dd>
                <dd>Retail goods</dd>
                <dd>Energy, oil and natural gas</dd>
            </dl>
        </div>
    </section>
<!-- 覆盖范围 end -->
<!-- 新闻 -->
    <section class="index-news">
        <div class="in-top">
            <div class="index_tit">
                <div>
                    <h3>News</h3>
                    <p>Latest information on customized logistics services</p>
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
                            <a href="<?php echo Url::build('/en_news_detail'); ?>?id=<?php echo htmlentities($li['id']); ?>"><img src="<?php echo htmlentities($li['img']); ?>" alt=""></a>
                        </div>
                        <div class="box">
                            <span><?php echo htmlentities(date('Y-m-d',!is_numeric($li['publishtime'])? strtotime($li['publishtime']) : $li['publishtime'])); ?></span>
                            <a href="<?php echo Url::build('/en_news_detail'); ?>?id=<?php echo htmlentities($li['id']); ?>"><h3 style="height: 50px;overflow: hidden;"><?php echo htmlentities($li['stitle']); ?></h3></a>
                            <p><?php echo htmlentities(getSubstr($li['en_desc'],0,110)); ?></p>
                            <a href="<?php echo Url::build('/en_news_detail'); ?>?id=<?php echo htmlentities($li['id']); ?>" class="more">More</a>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section>
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
