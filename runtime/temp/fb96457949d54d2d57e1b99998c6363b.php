<?php /*a:2:{s:53:"/opt/www/8915/application/admin/view/log/loglist.html";i:1536541712;s:54:"/opt/www/8915/application/admin/view/layout/index.html";i:1536541712;}*/ ?>
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
  #example1 tr:hover{
    background-color: #1EA2E3;color: white;
  }
    td{padding: 6px !important;}
  #example1 thead tr:hover:first-child{background:none;color:#333}
  .col-sm-7{width: 100%;text-align: center;}
</style>
<script type="text/javascript" src="/public/static/layer/layer.js"></script>
<script type="text/javascript" src="/public/static/public/common.js"></script>
<script type="text/javascript" src="/public/static/public/jquery.pjax.min.js"></script>
<script type="text/javascript" src="/public/static/public/nprogress.js"></script>
<link rel="stylesheet" href="/public/static/public/nprogress.css">
<script src="/public/static/admin/adminlte/bower_components/select2/js/select2.min.js"></script>
<script src="/public/static/admin/adminlte/bower_components/select2/js/i18n/zh-CN.js"></script>
<link rel="stylesheet" href="/public/static/admin/adminlte/bower_components/select2/css/select2.min.css">
<!-- date-range-picker -->
<script src="/public/static/admin/adminlte/bower_components/moment/min/moment.min.js"></script>
<script src="/public/static/admin/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="/public/static/admin/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="/public/static/admin/adminlte/bower_components/moment/locale/zh-cn.js"></script>
<!-- daterange picker -->
<link rel="stylesheet" href="/public/static/admin/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css">
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="/public/static/admin/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<section class="content" style="padding: 15px 0;margin-top:15px" >
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <!--<div class="box-header">-->
          <!--<h3 class="box-title">日志列表</h3>-->
        <!--</div>-->
        <!-- /.box-header -->
        <div class="box-body" >
          <div class="col-sm-6" style="width: 100%">
              <div class="col-md-3 col-sm-4" style="line-height: 40px;margin-top: 15px;">
                  <span style="width: 30%;display: block;">每页条数：</span>
                  <select datavalue="limit" class="form-control input-sm pjaxchangge" id="limitchangge" style="width: 50%;display: block;float: left;">
                  <option value="15">15</option>
                  <option value="20">20</option>
                  <option value="30">30</option>
                  <option value="50">50</option>
                  <option value="100">100</option>
                </select>
              </div>
              <div class="col-md-3 col-sm-4" style="line-height: 40px;margin-top: 15px;">
                <div class="form-group">
                  <span style="width: 30%;display: block;">日志类型：</span><select  datavalue="type" class="form-control input-sm pjaxchangge" id="logtype" style="width: 50%;display: block;">
                    <option selected="selected" value="-1">所有日志类型</option>
                  <?php foreach($logtype as $logkey=>$log): ?>
                    <option value="<?php echo htmlentities($logkey); ?>"><?php echo htmlentities($log); ?></option>
                  <?php endforeach; ?>
                </select>
                </div>
              </div>
              <div class="col-md-3 col-sm-4" style="line-height: 40px;margin-top: 15px;">
                <div class="form-group">
                    <span style="width: 30%;display: block;">选择权限：</span><select style="width: 50%;"  datavalue="uid"  class="form-control input-sm pjaxchangge  select2" id="uidvalueid" >
                    <option selected="selected" value="0">所有用户</option>
                <?php foreach($alluser as $user): ?>
                  <option value="<?php echo htmlentities($user['id']); ?>"><?php echo htmlentities($user['nickname']); ?></option>
                <?php endforeach; ?>
                </select>
                </div>
              </div>
              <div class="col-md-3 col-sm-4" style="width: 25%;line-height: 40px;margin-top: 15px;">
                  <div class="form-group" >
                         <div class="input-group">选择时间：
                          <button type="button" class="btn btn-default pull-right" id="daterange-btn">
                              <span>
                          <i class="fa fa-calendar"></i> 所有时间
                        </span>
                              <i class="fa fa-caret-down"></i>
                          </button>
                      </div>
                  </div>
                  <input type="hidden" id="starttime"  value="all">
                  <input type="hidden" id="endtime"  value="all">
              </div>
          </div>
          <div id="Contentspjax" >
          <table id="example1" class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
              <th>日志描述</th>
              <th>日志类型</th>
              <th>操作的用户</th>
              <th>操作时间</th>
              <th>操作IP</th>
            </tr>
            </thead>
            <tbody>
         <?php foreach($list as $li): ?>
            <tr>
              <td><?php echo htmlentities($li['remark']); ?></td>
              <td><?php echo htmlentities($logtype[$li['type']]); ?></td>
              <td><?php echo htmlentities($li['username']); ?></td>
              <td><?php echo htmlentities($li['addtime']); ?></td>
              <td><?php echo htmlentities($li['ip']); ?></td>
            </tr>
         <?php endforeach; ?>
            </tbody>
          </table>
          <div class="row">
            <div class="col-sm-5">
              <div class="dataTables_info"  role="status" aria-live="polite">
                <!--Showing 1 to 10 of 57 entries-->
              </div>
            </div>
            <div class="col-sm-7">
              <div class="dataTables_paginate paging_simple_numbers" >
                <?php echo $list->render(); ?>
              </div>
            </div>
          </div>
        </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
</section>
<script>
    $(function(){
        moment.locale('zh-cn');
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
//                timePicker: true,
//                timePicker24Hour: true,
                applyClass : 'btn-sm btn-success',
                cancelClass : 'btn-sm btn-default',
                locale: {
                    applyLabel: '确认',
                    cancelLabel: '取消',
                    fromLabel : '起始时间',
                    toLabel : '结束时间',
                    customRangeLabel : '自定义',
                    firstDay : 1
                },
                ranges   : {
                    '所有时间'       : [moment().subtract(9, 'days'), moment().subtract(9, 'days')],
                    '查询今天'       : [moment(), moment()],
                    '查询昨天'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    '查询过去七天' : [moment().subtract(6, 'days'), moment()],
                    '查询过去30天': [moment().subtract(29, 'days'), moment()],
                    '查询本月'  : [moment().startOf('month'), moment().endOf('month')],
                    '查询上个月'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate  : moment()
            },
            function (start, end, label) {
               if(label == '所有时间') {
                   $('#daterange-btn span').html('<i class="fa fa-calendar"></i> 所有时间');
                   $('#starttime').val('all');
                   $('#endtime').val('all');
               } else {
//                   $('#daterange-btn span').html('<i class="fa fa-calendar"></i> '+start.format('YYYY-MM-DD HH:mm') + ' - ' + end.format('YYYY-MM-DD HH:mm'))
                   $('#daterange-btn span').html('<i class="fa fa-calendar"></i> '+start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'))
                   $('#starttime').val(start.format('YYYY-MM-DD'));
                   $('#endtime').val(end.format('YYYY-MM-DD'));
               }
               //pjax
                var pstr = '';
                $(".pjaxchangge").each(function(){
                    var ids = $(this).attr('id');
                    var gettype = $(this).attr('datavalue');
                    pstr = pstr==''?gettype+"="+$('#'+ids).val():pstr+"&"+gettype+"="+$('#'+ids).val();
                })
                pstr = pstr+"&starttime="+$('#starttime').val()+"&endtime="+$('#endtime').val();
                $.pjax({
                    url: "<?php echo Url::build('admin/Log/logList'); ?>?"+pstr,
                    container: '#Contentspjax'
                });
            }

        )
        $('.select2').select2({
            language:'zh-CN'
        });
        $(".pjaxchangge").change(function(){
            var selectstr = '';
            $(".pjaxchangge").each(function(){
                var ids = $(this).attr('id');
                var gettype = $(this).attr('datavalue');
                selectstr = selectstr==''?gettype+"="+$('#'+ids).val():selectstr+"&"+gettype+"="+$('#'+ids).val();
            })
            selectstr = selectstr+"&starttime="+$('#starttime').val()+"&endtime="+$('#endtime').val();

            $.pjax({
                url: "<?php echo Url::build('admin/Log/logList'); ?>?"+selectstr,
                container: '#Contentspjax'
            });
        });
        $(document).pjax('.pagination li a', '#Contentspjax', { timeout:3000,replace:true,scrollTo:false});
        $(document).on('pjax:start', function() { NProgress.start(); });
        $(document).on('pjax:end',   function() { NProgress.done();  });
    })
</script>
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