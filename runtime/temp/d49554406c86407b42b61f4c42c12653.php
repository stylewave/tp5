<?php /*a:4:{s:72:"F:\xampp\htdocs\yangxing/application/index/view\english\en_business.html";i:1536314542;s:66:"F:\xampp\htdocs\yangxing/application/index/view\public\styles.html";i:1536285306;s:69:"F:\xampp\htdocs\yangxing/application/index/view\public\en_header.html";i:1536286250;s:69:"F:\xampp\htdocs\yangxing/application/index/view\public\en_footer.html";i:1536290326;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta  charset="UTF-8">
    <title>Business - <?php echo htmlentities($config['en_name']); ?></title>
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
    <?php foreach($banner as $ban): if($ban['cateid'] == 129): ?>
    <section class="page-banner" style="background: url(<?php echo htmlentities(str_replace('\\','/',$ban['img'])); ?>) center no-repeat;">
    <?php endif; endforeach; ?>
        <div class="tit">Business Scope</div>
        <!--<p>Business Scope</p>-->
    </section>
<!-- banner end -->

<!-- page-main -->
    <div class="page-main product">
        <div class="warp" id="news">
            <div class="index_tit">
                <div>
                    <h3>Business</h3>
                    <p>Customized logistics service</p>
                    <span></span>
                </div>
            </div>
            <ol>
                <?php foreach($list as $k=>$lis): foreach($lis['daos'] as $li): ?>
                    <li>
                        <div class="img">
                            <img src="<?php echo htmlentities($li['img']); ?>" alt="">
                            <a href="<?php echo Url::build('/en_business_detail'); ?>?id=<?php echo htmlentities($li['cateid']); ?>" class="more">More</a>
                        </div>
                        <div class="box">
                            <a href="<?php echo Url::build('/en_business_detail'); ?>?id=<?php echo htmlentities($li['cateid']); ?>"><h3><?php echo htmlentities($li['stitle']); ?></h3></a>
                            <p><?php echo htmlentities(getSubstr($li['en_desc'],0,112)); ?></p>
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
        <h1>Company commitment</h1>
        <p>As a contractor, we promise to be responsible for all supply chain management to ensure that your goods are safe, fast and on time.</p>
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

