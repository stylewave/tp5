<?php /*a:1:{s:65:"E:\data\8915/application/admin/view\message\messagelist_pjax.html";i:1536541712;}*/ ?>

<table id="example1" class="table table-bordered table-striped table-hover">
    <thead>
    <tr>
        <th>姓名</th>
        <th>邮箱</th>
        <th>问题</th>
        <th>内容</th>
        <th>提交时间</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($list as $li): ?>
    <tr>
        <td><?php echo htmlentities($li['username']); ?></td>
        <td><?php echo htmlentities($li['email']); ?></td>
        <td><?php echo htmlentities($li['title']); ?></td>
        <td><?php echo htmlentities($li['content']); ?></td>
        <td><?php echo htmlentities($li['addtime']); ?></td>
        <td><a href="javascript:void(0);" onclick="isdel('您确定要删除这条留言吗？','<?php echo Url::build('admin/Message/del',['id'=>$li['id']]); ?>');"><i class="fa fa-trash-o"></i> 删除</a></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
  <div class="row">
    <div class="col-sm-5">
      <div class="dataTables_info"  role="status" aria-live="polite"></div>
    </div>
    <div class="col-sm-7">
      <div class="dataTables_paginate paging_simple_numbers" >
          <?php echo $list->render(); ?>
      </div>
    </div>
  </div>