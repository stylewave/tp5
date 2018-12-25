<?php /*a:2:{s:53:"E:\data\8915/application/admin/view\system\index.html";i:1536541713;s:53:"E:\data\8915/application/admin/view\layout\index.html";i:1536541712;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>后台管理系统</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/public/static/admin/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/public/static/admin/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/public/static/admin/adminlte/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/public/static/admin/adminlte/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="/public/static/admin/adminlte/dist/css/skins/_all-skins.min.css">
    <!--[if lt IE 9]>
    <script src="/public/static/admin/adminlte/html5shiv.min.js"></script>
    <script src="/public/static/admin/adminlte/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery 3 -->
    <script src="/public/static/admin/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- jquery 1.11.3 -->
    <!--<script src="/public/static/public/jquery.js"></script>-->
    <!-- Google Font -->
    <link rel="stylesheet" href="/public/static/admin/adminlte/googleapis.css">
</head>
<body class="hold-transition <?php echo htmlentities($userinfo_auto['skin']); ?> sidebar-mini">
<div class="wrapper">
    <!-- Main Header -->
    <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo Url::build('admin/Index/index'); ?>" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">后台</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg">后台管理系统</span>
        </a>
        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        <!-- Menu toggle button -->
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-mail-reply-all"></i> 其他操作
                            <span class="label label-success"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <ul class="menu">
                                    <li><a href="<?php echo Url::build('/'); ?>" target="_blank"><p>网站首页</p></a></li>
                                    <li><a href="<?php echo Url::build('admin/System/admin'); ?>"><p>清除缓存</p></a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- /.messages-menu -->
                    <!-- Notifications Menu -->
                    <li class="dropdown notifications-menu">
                        <!-- Menu toggle button -->
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user-plus"></i> <?php echo htmlentities($userinfo_auto['nickname']); ?>
                            <span class="label label-warning"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">登录信息</li>
                            <li>
                                <ul class="menu">
                                    <li>
                                        <a href="javascript:void(0);">
                                             上次登录时间：<?php echo htmlentities(date('Y-m-d H:i:s',!is_numeric($userinfo_auto['lastlogintime'])? strtotime($userinfo_auto['lastlogintime']) : $userinfo_auto['lastlogintime'])); ?><br/>IP：<?php echo htmlentities($userinfo_auto['lastloginip']); ?>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            本次登录时间：<?php echo htmlentities(date('Y-m-d H:i:s',!is_numeric($userinfo_auto['logintime'])? strtotime($userinfo_auto['logintime']) : $userinfo_auto['logintime'])); ?><br/>IP：<?php echo htmlentities($userinfo_auto['loginip']); ?>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="<?php echo Url::build('admin/Index/loginout'); ?>">退出登录</a></li>
                        </ul>
                    </li>
                    <!-- Tasks Menu -->
                    <li class="dropdown tasks-menu">
                        <!-- Menu Toggle Button -->
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-adjust"></i>
                            <span class="label label-danger">换主题</span>
                        </a>
                        <ul class="dropdown-menu" style="height: 310px;">
                            <li class="header">点击主题进行切换</li>
                            <li>
                                <!-- Inner menu: contains the tasks -->
                                <ul class="menu" style="overflow: inherit;" >
                                    <!-- Task item -->
                                    <li>
                                        <a href="javascript:void(0);" onclick="qiehuanzhuti('skin-blue');">
                                            <!-- Task title and progress text -->
                                            <h3>蓝色</h3>
                                            <!-- The progress bar -->
                                            <div class="progress xs" style="height:auto">
                                                <!-- Change the css width attribute to simulate progress -->
                                                <div class="progress-bar progress-bar-aqua" style="width:100%;height: 25px;" role="progressbar"
                                                     aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">100% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" onclick="qiehuanzhuti('skin-yellow');">
                                            <!-- Task title and progress text -->
                                            <h3>黄色</h3>
                                            <!-- The progress bar -->
                                            <div class="progress xs" style="height:auto">
                                                <!-- Change the css width attribute to simulate progress -->
                                                <div class="progress-bar progress-bar-aqua" style="width:100%;background-color:yellow;height: 25px;" role="progressbar"
                                                     aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" >
                                                    <span class="sr-only">100% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" onclick="qiehuanzhuti('skin-red');">
                                            <!-- Task title and progress text -->
                                            <h3>红色</h3>
                                            <!-- The progress bar -->
                                            <div class="progress xs" style="height:auto">
                                                <!-- Change the css width attribute to simulate progress -->
                                                <div class="progress-bar progress-bar-aqua" style="width:100%;background-color:red;height: 25px;" role="progressbar"
                                                     aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">100% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" onclick="qiehuanzhuti('skin-purple');">
                                            <!-- Task title and progress text -->
                                            <h3>紫色</h3>
                                            <!-- The progress bar -->
                                            <div class="progress xs" style="height:auto">
                                                <!-- Change the css width attribute to simulate progress -->
                                                <div class="progress-bar progress-bar-aqua" style="width:100%;background-color:purple;height: 25px;" role="progressbar"
                                                     aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">100% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" onclick="qiehuanzhuti('skin-green');">
                                            <!-- Task title and progress text -->
                                            <h3>绿色</h3>
                                            <!-- The progress bar -->
                                            <div class="progress xs" style="height:auto">
                                                <!-- Change the css width attribute to simulate progress -->
                                                <div class="progress-bar progress-bar-aqua" style="width:100%;background-color:green;height: 25px;" role="progressbar"
                                                     aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">100% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar Menu -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">后台管理栏目</li>
                <!-- Optionally, you can add icons to the links -->
                <li class="<?php if($controname == 'Index'): ?>active menu-open<?php endif; ?>"><a href="<?php echo Url::build('admin/Index/index'); ?>"><i class="fa fa-bank"></i> <span>后台首页</span></a></li>
               <?php foreach($returnarr as $onekeys=>$htmenu): ?>
                    <li class="treeview <?php if($onekeys == $controname): ?>active menu-open<?php endif; ?>">
                        <a href="javascript:void(0);"><i class="fa  <?php echo htmlentities($htmenu['inco']); ?>"></i> <span><?php echo htmlentities($htmenu['title']); ?></span>
                            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                        </a>
                        <ul class="treeview-menu">
                            <?php foreach($htmenu['menu'] as $twokeys=>$htme): if(empty($htme['menu'])): ?>
                                    <li class=" <?php if(strtolower($twokeys) == $actionname): ?>active menu-open<?php endif; ?>"><a href="<?php echo htmlentities($htme['url']); ?>"><i class="fa  <?php echo htmlentities($htme['inco']); ?>"></i><?php echo htmlentities($htme['title']); ?></a></li>
                                <?php else: ?>
                                   <li class="treeview <?php 
                                   foreach($htme['menu'] as $threekeys=>$htu){
                                      if (strtolower($threekeys) == $actionname)
                                      {
                                        echo 'active menu-open';break;
                                      }
                                   }
                                       ?>">
                                        <a href="javascript:void(0);">
                                            <i class="fa <?php echo htmlentities($htme['inco']); ?>"></i> <span><?php echo htmlentities($htme['title']); ?></span>
                                            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                                        </a>
                                        <ul class="treeview-menu">
                                            <?php foreach($htme['menu'] as $threekeys=>$htu): ?>
                                                 <li class=" <?php if(strtolower($threekeys) == $actionname): ?>active<?php endif; ?>"><a href="<?php echo htmlentities($htu['url']); ?>"><i class="fa   <?php echo htmlentities($htu['inco']); ?>"></i> <?php echo htmlentities($htu['title']); ?></a></li>
                                            <?php endforeach; ?>
                                        </ul>
                                   </li>
                                <?php endif; endforeach; ?>
                        </ul>
                    </li>
                <?php endforeach; ?>
            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <ol class="breadcrumb" style="float: left;position: static;padding-left: 15px;">
                <li><a href="<?php echo Url::build('admin/Index/index'); ?>"><i class="fa  fa-home"></i> 后台首页</a></li>
                <?php foreach($dqlujing as $weizhi): ?>
                <li class="<?php echo htmlentities($weizhi['class']); ?>"><a href="<?php echo htmlentities($weizhi['url']); ?>"><?php echo htmlentities($weizhi['title']); ?></a></li>
                <?php endforeach; ?>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">
            <script charset="utf-8" src="/public/static/kin/kindeditor-all-min.js"></script>
<script charset="utf-8" src="/public/static/kin/lang/zh-CN.js"></script>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="nav-tabs-custom" style="margin-top: 20px;">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#fa-icons-server" data-toggle="tab">基本信息</a></li>
          <!--<li class=""><a href="#fa-icons-content" data-toggle="tab">邮件设置</a></li>-->
        </ul>
        <form action="<?php echo Url::build('admin/System/index');; ?>" enctype="multipart/form-data" method="post" name="qxform" id="qxform">
        <div class="tab-content">
          <!-- Font Awesome Icons -->
          <div class="tab-pane active" style="padding-left: 20px;" id="fa-icons-server">
            <section id="new">
              <div class="row fontawesome-icon-list">
                <div class="col-md-3 col-sm-4" >
                  <label>网站名称：</label><input type="text" id="name" name="name" value="<?php echo htmlentities($info['name']); ?>"> <span class="icon icon-title margin-small" ></span>
                </div>
                <div class="col-md-3 col-sm-4" >
                  <label>英文名称：</label><input type="text" id="en_name" name="en_name" value="<?php echo htmlentities($info['en_name']); ?>"> <span class="icon icon-en_title margin-small" ></span>
                </div>
                <div class="col-md-3 col-sm-4" >
                <label>网站标题：</label><input type="text" id="title" name="title" value="<?php echo htmlentities($info['title']); ?>"> <span class="icon icon-stitle margin-small" ></span>
                </div>
                <div class="col-md-3 col-sm-4" >
                <label>网站关键字：</label><textarea rows="2" name="keywords"><?php echo htmlentities($info['keywords']); ?></textarea>
                </div>
                <div class="col-md-3 col-sm-4" >
                <label>网站描述：</label><textarea rows="2" name="description"><?php echo htmlentities($info['description']); ?></textarea>
                </div>
                <div class="col-md-3 col-sm-4" >
                  <label>网站Logo：</label><span id="selectpic" style="cursor:pointer;color:#1E88C7;background: #D0EEFF;border-radius: 5px;padding:5px 22px;">选择图片</span>
                    <div style="margin-left: 63px;" id="preview"></div>
                    <input id="upload" name="logo" accept="image/*" type="file" style="display: none"/>
                </div>
                  <?php if(!empty($info['logo'])): ?>
                  <div class="col-md-3 col-sm-4" >
                    <label></label><a href="<?php echo htmlentities($info['logo']); ?>" target="_blank"><img src="<?php echo htmlentities($info['logo']); ?>" width="" height="" /></a>
                  </div>
                  <?php endif; ?>

                <div class="col-md-3 col-sm-4" >
                  <label>微信公众号：</label><span id="selectpics" style="cursor:pointer;color:#1E88C7;background: #D0EEFF;border-radius: 5px;padding:5px 22px;">选择图片</span>
                  <div style="margin-left: 63px;" id="previews"></div>
                  <input id="uploads" name="img" accept="image/*" type="file" style="display: none"/>
                </div>
                <?php if(!empty($info['img'])): ?>
                <div class="col-md-3 col-sm-4" >
                  <label></label><a href="<?php echo htmlentities($info['img']); ?>" target="_blank"><img src="<?php echo htmlentities($info['img']); ?>" width="100" height="100" /></a>
                </div>
                <?php endif; ?>
                <div class="col-md-3 col-sm-4">
                  <label>底部设置：</label><textarea rows="1" name="footer" style="text-indent:10px;width:100%;"><?php echo htmlentities($info['footer']); ?></textarea>
                </div>
                <div class="col-md-3 col-sm-4">
                  <label>底部设置(英)：</label><textarea rows="1" name="en_footer" style="text-indent:10px;width:100%;"><?php echo htmlentities($info['en_footer']); ?></textarea>
                </div>
                <div class="col-md-3 col-sm-4" >
                  <label>客服QQ：</label><input type="text" id="qq" name="qq" value="<?php echo htmlentities($info['qq']); ?>"> <span class="icon icon-stitle margin-small" ></span>
                </div>
                <div class="col-md-3 col-sm-4" >
                  <label>底部服务热线：</label><input type="text" id="tel" name="tel" value="<?php echo htmlentities($info['tel']); ?>"> <span class="icon icon-stitle margin-small" ></span>
                </div>
                <div class="col-md-3 col-sm-4" >
                  <label>底部邮箱：</label><input type="text" id="email" name="email" value="<?php echo htmlentities($info['email']); ?>"> <span class="icon icon-stitle margin-small" ></span>
                </div>
                <div class="col-md-3 col-sm-4">
                  <label>底部地址：</label><textarea rows="2" name="address"><?php echo htmlentities($info['address']); ?></textarea>
                </div>
                <div class="col-md-3 col-sm-4">
                  <label>底部地址（英文）：</label><textarea rows="2" name="addr"><?php echo htmlentities($info['addr']); ?></textarea>
                </div>
              </div>
            </section>
          </div>
          <!--<div class="tab-pane" style="padding-left: 20px;" id="fa-icons-content">-->
            <!--<div class="row fontawesome-icon-list">-->
              <!--<div class="col-md-3 col-sm-4" style="color:#f00">-->
                <!--温馨提示：发件人邮件必须开启STMP服务才能使用-->
              <!--</div>-->
              <!--<div class="col-md-3 col-sm-4" >-->
                <!--<label>SMTP服务器：</label><input type="text" name="sms" value="<?php echo htmlentities($info['sms']); ?>" placeholder="发送邮箱的smtp地址。如: smtp.gmail.com或smtp.qq.com"> <span class="icon icon-title margin-small" ></span>-->
              <!--</div>-->
              <!--<div class="col-md-3 col-sm-4" >-->
                <!--<label>SMTP端口：</label><input type="text" name="smdk" value="<?php echo htmlentities($info['smdk']); ?>" placeholder="smtp的端口。默认为25。具体请参看各STMP服务商的设置说明 （如果使用Gmail，请将端口设为465）"> <span class="icon icon-stitle margin-small" ></span>-->
              <!--</div>-->
              <!--<div class="col-md-3 col-sm-4" >-->
                <!--<label>SMTP用户名：</label><input type="text" name="smuser" value="<?php echo htmlentities($info['smuser']); ?>" placeholder="使用发送邮件的邮箱账号"> <span class="icon icon-title margin-small" ></span>-->
              <!--</div>-->
              <!--<div class="col-md-3 col-sm-4" >-->
                <!--<label>SMTP密码：</label><input type="text" name="smpwd" value="<?php echo htmlentities($info['smpwd']); ?>" placeholder="使用发送邮件的邮箱密码或者授权码"> <span class="icon icon-stitle margin-small" ></span>-->
              <!--</div>-->
              <!--<div class="col-md-3 col-sm-4" >-->
                <!--<label>SMTP发件人：</label><input type="text" name="smname" value="<?php echo htmlentities($info['smname']); ?>" placeholder="发件人名称"> <span class="icon icon-title margin-small" ></span>-->
              <!--</div>-->
              <!--<div class="col-md-3 col-sm-4" >-->
                <!--<label>发件人邮件：</label><input type="text" name="sendemail" value="<?php echo htmlentities($info['sendemail']); ?>" placeholder="发送邮件的邮箱账号"> <span class="icon icon-stitle margin-small" ></span>-->
              <!--</div>-->
              <!--<div class="col-md-3 col-sm-4" >-->
                <!--<label>接收者邮件：</label><input type="text" name="jieshou" value="<?php echo htmlentities($info['jieshou']); ?>" placeholder="接收者邮件"> <span class="icon icon-title margin-small" ></span>-->
              <!--</div>-->
              <!--<div class="col-md-3 col-sm-4" >-->
                <!--<label>是否开启：</label>-->
                  <!--<div class="onoff">-->
                    <!--<label for="switch1" class="cb-enable <?php if($info['is_open'] == 1): ?>selected<?php endif; ?>">开启</label>-->
                    <!--<label for="switch0" class="cb-disable <?php if($info['is_open'] == 0): ?>selected<?php endif; ?>">关闭</label>-->
                    <!--<input type="radio" id="switch1"  name="is_open" value="1" checked="<?php if($info['is_open'] == 1): ?>checked<?php endif; ?>">-->
                    <!--<input type="radio" id="switch0" name="is_open" value="0" <?php if($info['is_open'] == 0): ?>checked="checked"<?php endif; ?>>-->
                  <!--</div>-->
              <!--</div>-->
            <!--</div>-->
          <!--</div>-->
          <button type="button" class="btn btn-primary" style="margin-top: 10px;margin-bottom:20px;margin-left: 100px;" onclick="qxsubmit();">提交</button><span class="icon icon-ms margin-small" ></span>
        </div>
        </form>
        <!-- /.tab-content -->
      </div>
    </div>
    <!-- /.col -->
  </div>
<style>
  .col-sm-4{width:60%;line-height:30px;margin-top:15px;display: inline-block;}
  .col-sm-4 label{color:#555;width:auto;font-weight:500}
  .col-sm-4 input{color:#444444;width:100%;text-indent:10px;}
  .col-sm-4 textarea{text-indent:10px;width:100%;}
</style>
<script type="text/javascript" src="/public/static/layer/layer.js"></script>
<script type="text/javascript" src="/public/static/public/common.js"></script>
<script>
    function qxsubmit() {
        document.qxform.submit();
    }
    $(function() {
        $("#selectpic").click(function () {
            $("#upload").click();
            $("#upload").on("change",function(){
                previewImage(this,'preview',200,200);
            });
        });
        $("#selectpics").click(function () {
            $("#uploads").click();
            $("#uploads").on("change",function(){
                previewImages(this,'previews',200,200);
            });
        });
    });
    $("div.onoff label").click(function (){
        $(this).addClass("selected").siblings("label").removeClass("selected");
    });
</script>
</section>





        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</div>
<!-- Bootstrap 3.3.7 -->
<script src="/public/static/admin/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="/public/static/admin/adminlte/dist/js/adminlte.min.js"></script>
<script>
    function qiehuanzhuti(value) {
        try{
            var is = false;
            $.ajax({
                type: 'POST',
                async: false,
                url: "<?php echo Url::build('admin/Index/setSkin'); ?>",
                data: {skin:value},
                success: function (data) {
                    if (data.code == 1) {

                    } else {
                        is = true;
                    }
                    rmsg = data.msg;
                }
            });
            if(is) {
                throw rmsg;
            }
            var skinsall = ['skin-blue','skin-purple','skin-yellow','skin-red','skin-green'];
            for(var i=0;i<skinsall.length;i++) {
                $('body').removeClass(skinsall[i]);
            }
            $('body').addClass(value);
        }catch (e){
            alert(e);
            return false;
        }
    }
</script>
<style>
    body #think_page_trace_open img{display: none}
    .col-sm-6{padding-bottom: 20px;}
    .col-md-3{line-height: 30px !important;}
    .form-group{margin-bottom: 0;}
    .select2-container--default .select2-selection--single .select2-selection__rendered{line-height: 24px}
    table tr td{vertical-align: middle !important;text-align: center;}
    table tr th{text-align: center;}
    .fa-ban{color:#F61B1B}
    /*是否显示*/
    .onoff {display: -moz-box;width: 50%; font-size: 0; position: relative; overflow: hidden; padding-top: 5px; }
    .onoff label { vertical-align: top; display: inline-block; *display: inline;*zoom: 1;cursor: pointer; width: auto !important;}
    .onoff input[type="radio"] { position: absolute; top: 0; left: -999px; }
    .onoff .cb-enable,.onoff .cb-disable { color: #777; font-size: 12px; line-height: 23px; background-color: #ECF0F1; height: 25px; padding: 1px 12px; border-style: solid; border-color: #BEC3C7; }
    .onoff .cb-enable { border-width: 1px 0 1px 1px; border-radius: 4px 0 0 4px; }
    .onoff .cb-disable { border-width: 1px 1px 1px 0; border-radius: 0 4px 4px 0; }
    .onoff .cb-disable.selected { color: #FFF; background-color: #96A6A6; border-color: #808B8D; }
    .onoff .cb-enable.selected { color: #FFF; background-color: #1BBC9D; border-color: #16A086 }

    button, input{
        line-height: 0 !important;
        padding: 10px 0 !important;
    }
    .btn{
        line-height: 0 !important;
        padding: 15px 30px !important;
    }
</style>
<script>
    $("div.onoff label").click(function (){
        $(this).addClass("selected").siblings("label").removeClass("selected");
    });
</script>
</body>
</html>