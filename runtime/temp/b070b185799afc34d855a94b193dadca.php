<?php /*a:4:{s:55:"/opt/www/8915/application/index/view/index/contact.html";i:1536541714;s:54:"/opt/www/8915/application/index/view/public/style.html";i:1539661873;s:55:"/opt/www/8915/application/index/view/public/header.html";i:1539661659;s:55:"/opt/www/8915/application/index/view/public/footer.html";i:1536541715;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta  charset="UTF-8">
    <title>联系我们 - <?php echo htmlentities($config['title']); ?></title>
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
    .header .nav .nav-active7::after{
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
    <?php foreach($banner as $ban): if($ban['cateid'] == 133): ?>
    <section class="page-banner" style="background: url(<?php echo htmlentities(str_replace('\\','/',$ban['img'])); ?>) center no-repeat;">
    <?php endif; endforeach; ?>
        <div class="tit">联系我们</div>
        <p>contact</p>
    </section>
<!-- banner end -->

<!-- page-main -->
    <div class="page-main">
        <div class="warp">
            <div class="pm-nav">
                <a href="/">首页</a>
                <span>></span>
                <a href="<?php echo Url::build('/contact'); ?>">联系我们</a>
            </div>
            <div class="contact">
                <div class="contact-li fl">
                    <h3>在线留言</h3>
                    <form id="form_sub" enctype="multipart/form-data">
                        <label>
                            <p><b>*</b>您的要求：</p>
                            <select name="title" id="title">
                                <option value="">请选择</option>
                                <option value="我需要海运整柜报价">我需要海运整柜报价</option>
                                <option value="我需要海运散货报价">我需要海运散货报价 </option>
                                <option value="我需要空运报价">我需要空运报价</option>
                                <option value="我需要拖车报价">我需要拖车报价</option>
                                <option value="其他">其他</option>
                            </select>    
                        </label>
                        <label>
                            <p><b>*</b>姓名：</p>
                            <input type="text" name="username" id="username">
                        </label>
                        <label>
                            <p><b>*</b>电子邮件：</p>
                            <input type="text" name="email" id="email">
                        </label>
                        <label>
                            <p><b>*</b>留言：</p>
                            <textarea name="content" id="content"></textarea>
                        </label>
                    </form>
                    <a href="javascript:void(0);" class="btn" id="submit">发送</a>
                </div>
                <div class="contact-li fr">
                    <h3>货运总部</h3>
                        <style>
                            .BMap_cpyCtrl{display: none}
                            #dituContent span{
                                width:13px !important;
                                height:21px !important;
                                background: url(/public/static/home/images/map.png) no-repeat !important;
                                background-size:100% !important;
                            }
                            .BMap_Marker img{display: none !important}
                        </style>
                    <div class="map" id="dituContent"></div>
                    <h3>公司信息</h3>
                    <div class="ctl-tab">
                        <?php $i=0;foreach($list as $li): $i++;?>
                        <li class="<?php if($i==1): ?>ctl-active<?php endif; ?>"><?php echo htmlentities($li['city']); ?></li>
                        <?php endforeach; ?>
                    </div>
                    <div class="ctl-cont">
                        <?php $b=0;foreach($list as $lis): $b++;?>
                        <div <?php if($b==1): ?>style="display: block;"<?php endif; ?>>
                            <p>
                                <?php if($lis['address'] !== ''): ?>地址：<?php echo htmlentities($lis['address']); ?><br><?php endif; if($lis['username'] !== ''): ?>联系人：<?php echo htmlentities($lis['username']); ?><br><?php endif; if($lis['tel'] !== ''): ?>Tel：<span><?php echo htmlentities($lis['tel']); ?></span><br><?php endif; if($lis['mobile'] !== ''): ?>Mob：<span><?php echo htmlentities($lis['mobile']); ?></span><br><?php endif; if($lis['qq'] !== ''): ?>QQ：<?php echo htmlentities($lis['qq']); ?><br><?php endif; if($lis['email'] !== ''): ?>E-mail： <?php echo htmlentities($lis['email']); endif; ?>
                            </p>
                        </div>
                    <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- page-main end -->
<script>
        $("#submit").click(function(){

            if($('#title').val() == ''){
                alert('请选择要求!');
                return false;
            }
            if($('#username').val() == ''){
                alert('请填写您的姓名!');
                return false;
            }
            if($('#email').val() == ''){
                alert('请填写您的邮箱!');
                return false;
            }
            if(!checkEmail($('#email').val())){
                alert('邮箱格式有误!');
                return false;
            }

            // 先接收表单中的数据，并拼成这样式格式的字符串： name=tom&age=231
            var form = $("#form_sub");
            var formData = form.serialize();
            $.ajax({
                type : "post",
                url : "contact",
                data : formData, // 表单中要提交的数据
                dataType : "json",  // 服务器返回的数据格式
                success : function(data)
                {
                    if(data.code == 0)
                    {
                        alert(data.msg);
                    }else{
                        alert(data.msg);
                        form.trigger('reset');
                    }
                }
            });
        });

    //邮箱格式判断
    function checkEmail(str){
        var reg = /^[a-z0-9]([a-z0-9\\.]*[-_]{0,4}?[a-z0-9-_\\.]+)*@([a-z0-9]*[-_]?[a-z0-9]+)+([\.][\w_-]+){1,5}$/i;
        if(reg.test(str)){
            return true;
        }else{
            return false;
        }
    }
</script>
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
    $(function(){
        $(".ctl-tab li").click(function(){
            $(this).addClass("ctl-active").siblings().removeClass("ctl-active");
            var index=$(this).index();
            $(".ctl-cont > div").eq(index).show().siblings().hide();
        });
    });
</script>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=OyxghDAmdA0Le5oRBGmSoxgSWv9Ik6fH"></script>
<script type="text/javascript">
    //创建和初始化地图函数：
    function initMap(){
        createMap();//创建地图
        setMapEvent();//设置地图事件
        addMapControl();//向地图添加控件
        addMarker();//向地图中添加marker
    }
    
    //创建地图函数：
    function createMap(){
        var map = new BMap.Map("dituContent");//在百度地图容器中创建一个地图
        var point = new BMap.Point(114.123351,22.546797);//定义一个中心点坐标
        map.centerAndZoom(point,19);//设定地图的中心点和坐标并将地图显示在地图容器中
        window.map = map;//将map变量存储在全局
    }
    
    //地图事件设置函数：
    function setMapEvent(){
        map.enableDragging();//启用地图拖拽事件，默认启用(可不写)
        map.enableScrollWheelZoom();//启用地图滚轮放大缩小
        map.enableDoubleClickZoom();//启用鼠标双击放大，默认启用(可不写)
        map.enableKeyboard();//启用键盘上下左右键移动地图
    }
    
    //地图控件添加函数：
    function addMapControl(){
        //向地图中添加缩放控件
    var ctrl_nav = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_LARGE});
    map.addControl(ctrl_nav);
        //向地图中添加缩略图控件
    var ctrl_ove = new BMap.OverviewMapControl({anchor:BMAP_ANCHOR_BOTTOM_RIGHT,isOpen:1});
    map.addControl(ctrl_ove);
        //向地图中添加比例尺控件
    var ctrl_sca = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT});
    map.addControl(ctrl_sca);
    }
    
    //标注点数组
    var markerArr = [
        {title:"深圳洋星通运国际货运代理有限公司(深圳总部)",content:"地址：深圳市罗湖区建设路2020号南方证券大厦B座1601室",point:"114.123351|22.546797",isOpen:1,icon:{w:21,h:21,l:0,t:0,x:6,lb:5}},
        {title:"深圳洋星通运国际货运代理有限公司(广州分公司)",content:"地址：广州市环市中路371号世界贸易中心大厦南塔2517室",point:"113.294134|23.142497",isOpen:0,icon:{w:21,h:21,l:0,t:0,x:6,lb:5}},
        {title:"深圳洋星通运国际货运代理有限公司(蛇口分公司)",content:"地址：深圳南山区泛海城市广场A座807室",point:"113.899393|22.500832",isOpen:0,icon:{w:21,h:21,l:0,t:0,x:6,lb:5}},
        // {title:"深圳洋星通运国际货运代理有限公司(香港分公司)",content:"地址：Unit 04 7/f Bright Way Tower No 33 Mongkok Road KL",point:"113.899393|22.500832",isOpen:0,icon:{w:21,h:21,l:0,t:0,x:6,lb:5}}
    ];
    //创建marker
    function addMarker(){
        for(var i=0;i<markerArr.length;i++){
            var json = markerArr[i];
            var p0 = json.point.split("|")[0];
            var p1 = json.point.split("|")[1];
            var point = new BMap.Point(p0,p1);
            var iconImg = createIcon(json.icon);
            var marker = new BMap.Marker(point,{icon:iconImg});
            var iw = createInfoWindow(i);
            var label = new BMap.Label(json.title,{"offset":new BMap.Size(json.icon.lb-json.icon.x+10,-20)});
            marker.setLabel(label);
            map.addOverlay(marker);
            label.setStyle({
                        borderColor:"#808080",
                        color:"#333",
                        cursor:"pointer"
            });
            
            (function(){
                var index = i;
                var _iw = createInfoWindow(i);
                var _marker = marker;
                _marker.addEventListener("click",function(){
                    this.openInfoWindow(_iw);
                });
                _iw.addEventListener("open",function(){
                    _marker.getLabel().hide();
                })
                _iw.addEventListener("close",function(){
                    _marker.getLabel().show();
                })
                label.addEventListener("click",function(){
                    _marker.openInfoWindow(_iw);
                })
                if(!!json.isOpen){
                    label.hide();
                    _marker.openInfoWindow(_iw);
                }
            })()
        }
    }
    //创建InfoWindow
    function createInfoWindow(i){
        var json = markerArr[i];
        var iw = new BMap.InfoWindow("<b class='iw_poi_title' title='" + json.title + "'>" + json.title + "</b><div class='iw_poi_content'>"+json.content+"</div>");
        return iw;
    }
    //创建一个Icon
    function createIcon(json){
        var icon = new BMap.Icon("http://app.baidu.com/map//public/static/home/images/us_mk_icon.png", new BMap.Size(json.w,json.h),{imageOffset: new BMap.Size(-json.l,-json.t),infoWindowOffset:new BMap.Size(json.lb+5,1),offset:new BMap.Size(json.x,json.h)})
        return icon;
    }
    
    initMap();//创建和初始化地图
</script>

