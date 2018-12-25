<?php /*a:4:{s:71:"F:\xampp\htdocs\yangxing/application/index/view\english\en_contact.html";i:1536314522;s:66:"F:\xampp\htdocs\yangxing/application/index/view\public\styles.html";i:1536285306;s:69:"F:\xampp\htdocs\yangxing/application/index/view\public\en_header.html";i:1536286250;s:69:"F:\xampp\htdocs\yangxing/application/index/view\public\en_footer.html";i:1536290326;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta  charset="UTF-8">
    <title>Contact - <?php echo htmlentities($config['en_name']); ?></title>
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
    <?php foreach($banner as $ban): if($ban['cateid'] == 133): ?>
    <section class="page-banner" style="background: url(<?php echo htmlentities(str_replace('\\','/',$ban['img'])); ?>) center no-repeat;">
    <?php endif; endforeach; ?>
        <div class="tit">Contact</div>
        <!--<p>contact</p>-->
    </section>
<!-- banner end -->

<!-- page-main -->
    <div class="page-main">
        <div class="warp">
            <div class="pm-nav">
                <a href="<?php echo Url::build('/en_index'); ?>">Home</a>
                <span>></span>
                <a href="<?php echo Url::build('/en_contact'); ?>">Contact</a>
            </div>
            <div class="contact">
                <div class="contact-li fl">
                    <h3>Online Message</h3>
                    <form id="form_sub" enctype="multipart/form-data">
                        <label>
                            <p><b>*</b>Your Request：</p>
                            <select name="title" id="title">
                                <option value="">Please Choose</option>
                                <option value="我需要海运整柜报价">I need to quote the whole cabinet.</option>
                                <option value="我需要海运散货报价">I need ocean bulk quote. </option>
                                <option value="我需要空运报价">I need to quote by air.</option>
                                <option value="我需要拖车报价">I need a trailer quote.</option>
                                <option value="其他">Other</option>
                            </select>    
                        </label>
                        <label>
                            <p><b>*</b>Name：</p>
                            <input type="text" name="username" id="username">
                        </label>
                        <label>
                            <p><b>*</b>E-mail：</p>
                            <input type="text" name="email" id="email">
                        </label>
                        <label>
                            <p><b>*</b>Message：</p>
                            <textarea name="content" id="content"></textarea>
                        </label>
                    </form>
                    <a href="javascript:void(0);" class="btn" id="submit">Send</a>
                </div>
                <div class="contact-li fr">
                    <h3>Freight Headquarters</h3>
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
                    <h3>Company Information</h3>
                    <div class="ctl-tab">
                        <?php $i=0;foreach($list as $li): $i++;?>
                        <li class="<?php if($i==1): ?>ctl-active<?php endif; ?>"><?php echo htmlentities($li['en_city']); ?></li>
                        <?php endforeach; ?>
                    </div>
                    <div class="ctl-cont">
                        <?php $b=0;foreach($list as $lis): $b++;?>
                        <div <?php if($b==1): ?>style="display: block;"<?php endif; ?>>
                            <p>
                                <?php if($lis['address'] !== ''): ?>ADD.：<?php echo htmlentities($lis['en_address']); ?><br><?php endif; if($lis['username'] !== ''): ?>Contacts：<?php echo htmlentities($lis['en_username']); ?><br><?php endif; if($lis['tel'] !== ''): ?>Tel：<span><?php echo htmlentities($lis['tel']); ?></span><br><?php endif; if($lis['mobile'] !== ''): ?>Mob：<span><?php echo htmlentities($lis['mobile']); ?></span><br><?php endif; if($lis['qq'] !== ''): ?>QQ：<?php echo htmlentities($lis['qq']); ?><br><?php endif; if($lis['email'] !== ''): ?>E-mail： <?php echo htmlentities($lis['email']); endif; ?>
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
                alert('Please select the request.!');
                return false;
            }
            if($('#username').val() == ''){
                alert('Please fill in your name.!');
                return false;
            }
            if($('#email').val() == ''){
                alert('Please fill in your mailbox.!');
                return false;
            }
            if(!checkEmail($('#email').val())){
                alert('Incorrect mailbox format!');
                return false;
            }

            // 先接收表单中的数据，并拼成这样式格式的字符串： name=tom&age=231
            var form = $("#form_sub");
            var formData = form.serialize();
            $.ajax({
                type : "post",
                url : "en_contact",
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
        {title:"Shenzhen Yang Xing Tong Yun International Freight Forwarding Co., Ltd.(Shenzhen)",content:"ADD.：Room 1601, block B, Nanfang Securities Building, 2020 Jianshe Road, Luohu District, Shenzhen.",point:"114.123351|22.546797",isOpen:1,icon:{w:21,h:21,l:0,t:0,x:6,lb:5}},
        {title:"Shenzhen Yang Xing Tong Yun International Freight Forwarding Co., Ltd.(Guangzhou)",content:"ADD.：Room 2517, South Tower, World Trade Center Building, 371 Central Road, Guangzhou",point:"113.294134|23.142497",isOpen:0,icon:{w:21,h:21,l:0,t:0,x:6,lb:5}},
        {title:"Shenzhen Yang Xing Tong Yun International Freight Forwarding Co., Ltd.(Shekou)",content:"ADD.：Room 807, block A, pan Hai City Plaza, Nanshan District, Shenzhen.",point:"113.899393|22.500832",isOpen:0,icon:{w:21,h:21,l:0,t:0,x:6,lb:5}},
        // {title:"Shenzhen Yang Xing Tong Yun International Freight Forwarding Co., Ltd.(香港分公司)",content:"ADD.：Unit 04 7/f Bright Way Tower No 33 Mongkok Road KL",point:"113.899393|22.500832",isOpen:0,icon:{w:21,h:21,l:0,t:0,x:6,lb:5}}
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

