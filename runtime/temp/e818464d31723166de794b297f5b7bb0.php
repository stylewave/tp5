<?php /*a:4:{s:56:"/opt/www/8915/application/index/view/index/business.html";i:1536541714;s:54:"/opt/www/8915/application/index/view/public/style.html";i:1539661873;s:55:"/opt/www/8915/application/index/view/public/header.html";i:1539661659;s:55:"/opt/www/8915/application/index/view/public/footer.html";i:1536541715;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta  charset="UTF-8">
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
    .header .nav .nav-active3::after{
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
    <?php foreach($banner as $ban): if($ban['cateid'] == 129): ?>
    <section class="page-banner" style="background: url(<?php echo htmlentities(str_replace('\\','/',$ban['img'])); ?>) center no-repeat;">
    <?php endif; endforeach; ?>
        <div class="tit">业务范围</div>
        <p>Business Scope</p>
    </section>
<!-- banner end -->

<!-- page-main -->
    <div class="page-main product">
        <div class="warp" id="news">
            <div class="index_tit">
                <div>
                    <h3>业务范围</h3>
                    <p>定制物流服务</p>
                    <span></span>
                </div>
            </div>
            <ol>
                <?php foreach($list as $k=>$lis): foreach($lis['daos'] as $li): ?>
                    <li>
                        <div class="img">
                            <img src="<?php echo htmlentities($li['img']); ?>" alt="">
                            <a href="<?php echo Url::build('/business_detail'); ?>?id=<?php echo htmlentities($li['cateid']); ?>" class="more">阅读更多</a>
                        </div>
                        <div class="box">
                            <a href="<?php echo Url::build('/business_detail'); ?>?id=<?php echo htmlentities($li['cateid']); ?>"><h3><?php echo htmlentities($li['title']); ?></h3></a>
                            <p><?php echo htmlentities(getSubstr($li['desc'],0,48)); ?></p>
                        </div>
                    </li>
                    <?php endforeach; endforeach; ?>
            </ol>
            <div class="page"></div>

        </div>
    </div>
<!-- page-main end -->

<!-- 公司承诺 -->
    <section class="product-promise">
        <h1>公司承诺</h1>
        <p>作为承包商，我们承诺将负责所有供应链管理，确保您的货物安全，快速，准时。</p>
    </section>
<!-- 公司承诺 end -->

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
<script type="text/javascript">
    function ellipsis(obj,num){
        var oSpan = document.createElement("span");
        oSpan.innerHTML = obj.innerHTML.length > num ? "...":"";
        obj.innerHTML = obj.innerHTML.substring(0,num);
        obj.appendChild(oSpan);
    }

    function getElements(obj,attr,value){
        var arr = new Array();
        for(var i=0;i<obj.length;i++){
            if(obj[i].getAttribute(attr)==value){
                arr.push(obj[i]);
            }
        }
        return arr;    
    }
    var oNews = document.getElementById("news");
    var aP = oNews.getElementsByTagName("p");
    var aPara = getElements(aP,"data-type","paragraph");
    for(var i=0;i<aPara.length;i++){
        ellipsis(aPara[i],10);
    }
</script>
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

