<?php /*a:2:{s:54:"/opt/www/8915/application/admin/view/rbac/adduser.html";i:1536541713;s:54:"/opt/www/8915/application/admin/view/layout/index.html";i:1536541712;}*/ ?>
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
            <style>
  .ddddddddddddddddddd:hover{
    background-color: #1EA2E3;color: white;
  }
</style>
<link rel="stylesheet" href="/public/static/admin/adminlte/bower_components/select2/css/select2.min.css">
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="nav-tabs-custom" style="margin-top: 20px;">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#fa-icons-server" data-toggle="tab"><?php if(isset($info) && !empty($info)): ?>修改<?php else: ?>添加<?php endif; ?>权限组成员</a></li>
        </ul>
        <div class="tab-content">
          <!-- Font Awesome Icons -->
          <div class="tab-pane active" id="fa-icons-server">
            <form action="<?php echo Url::build('admin/Rbac/addUser');; ?>" method="post" name="qxform" id="qxform">
              <input type="hidden" name="__token__" value="<?php echo htmlentities(app('request')->token()); ?>" />
              <input type="hidden" name="id" id="infoid" value="<?php echo htmlentities($info['id']); ?>" />
            <section id="new">
              <!--<h4 class="page-header">成员信息</h4>-->
              <div class="row fontawesome-icon-list">
                <div class="col-md-3 col-sm-4">
                  登录账号：<input type="text" style="color: #444444;width: 80%" id="username" name="username" value="<?php echo htmlentities($info['username']); ?>"> <span style="color: red">*</span><span class="icon icon-username margin-small" ></span>
                </div>
                <div class="col-md-3 col-sm-4">
                  姓名昵称：<input type="text" style="color: #444444;width: 80%" id="nickname" name="nickname" value="<?php echo htmlentities($info['nickname']); ?>"> <span style="color: red">*</span><span class="icon icon-nickname margin-small" ></span>
                </div>
                <div class="col-md-3 col-sm-4">
                  登录密码：<input type="password" style="color: #444444;width: 80%" id="pass" name="pass" value=""> <span style="color: red">*<?php if($info): ?>不改密码留空<?php endif; ?></span><span class="icon icon-pass margin-small" ></span>
                </div>
                <div class="col-md-3 col-sm-4">
                  确认密码：<input type="password" style="color: #444444;width: 80%" id="rpass" name="rpass" value=""> <span style="color: red">*<?php if($info): ?>不改密码留空<?php endif; ?></span><span class="icon icon-rpass margin-small" ></span>
                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="form-group">
                      选择权限：<select class="form-control select2" style="width: 50%;" name="pre" id="pre">
                        <?php if(!$info): ?><option selected="selected" value="0">请选择成员所属权限组</option><?php endif; foreach($rbacs as $rbac): ?>
                          <option value="<?php echo htmlentities($rbac['id']); ?>" <?php if($rbac['id'] == $info['pre']): ?>selected<?php endif; ?>><?php echo htmlentities($rbac['title']); ?></option>
                        <?php endforeach; ?>
                      </select>
                      <span class="icon icon-pre margin-small" ></span>
                    </div>
                </div>
              </div>
            </section>
              <button type="button" class="btn btn-primary" style="margin-top: 30px;margin-left: 100px;" onclick="qxsubmit();">提交</button><span class="icon icon-userqx margin-small" ></span>
              <button type="button" class="btn" style="margin-top: 50px;margin-bottom:20px;background: #ecf0f5" onclick="javascript:window.history.back(-1);">返回</button>
          </form>
          </div>
          <!-- /#fa-icons -->
        </div>
        <!-- /.tab-content -->
      </div>
    </div>
    <!-- /.col -->
  </div>
  <style>
    .col-sm-4{width: 60%;line-height: 30px;margin-top: 15px;}
    .col-sm-4 input,.col-sm-4 textarea{text-indent: 10px}
  </style>
  <script type="text/javascript" src="/public/static/layer/layer.js"></script>
  <script type="text/javascript" src="/public/static/public/common.js"></script>
  <script src="/public/static/admin/adminlte/bower_components/select2/js/select2.min.js"></script>
  <script src="/public/static/admin/adminlte/bower_components/select2/js/i18n/zh-CN.js"></script>
<script>
  $(function(){
      $('.select2').select2({
          language:'zh-CN'
      });
  })
  function qxsubmit() {
    if($('#username').val() == '') {
        tips('请填写成员登录账号！','.icon-username','username');
        return false;
    }
      if($('#nickname').val() == '') {
          tips('请填写成员姓名！','.icon-nickname','nickname');
          return false;
      }
      if($('#infoid').val() > 0) {

      } else {
          if($('#pass').val() == '') {
              tips('请填写登录密码！','.icon-pass','pass');
              return false;
          }
      }
      if($('#pass').val() != $('#rpass').val()) {
          tips('两次输入密码不一致！','.icon-rpass','rpass');
          return false;
      }

      if($('#pre').val() == '0') {
          tips('请选择用户所属权限组！','.icon-pre','pre');
          return false;
      }
    document.qxform.submit();
  }
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