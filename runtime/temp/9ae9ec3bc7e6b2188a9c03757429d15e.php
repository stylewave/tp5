<?php /*a:1:{s:71:"F:\xampp\htdocs\yangxing/application/admin/view\cate\cateList_pjax.html";i:1530081708;}*/ ?>


            <table id="example1" class="table table-bordered table-striped table-hover">
              <thead>
              <tr>
                <th>分类ID</th>
                <th>分类名称</th>
                <th>英文分类名称</th>
                <th>上级分类</th>
                <th>所属类别</th>
                <th>是否显示</th>
                <th>分类排序</th>
                <th>添加时间</th>
                <th>操作</th>
              </tr>
              </thead>
              <tbody>
              <?php $i=0;foreach($lists['data'] as $li): $i++;?>
              <tr>
                <td><?php echo htmlentities($li['id']); ?></td>
                <td style="text-align: left;padding-left: 3%"><?php if($li['dj'] > 0)  {echo str_repeat(" ---- ",$li['dj'])." ";} ?><?php echo htmlentities($li['title']); ?></td>
                <td style="text-align: left;padding-left: 5%"><?php if($li['dj'] > 0)  {echo str_repeat(" ---- ",$li['dj'])." ";} ?><?php echo htmlentities($li['en_title']); ?></td>
                <td><?php echo htmlentities($li['pname']); ?></td>
                <td><a href="<?php echo Url::build('admin/Cate/typeList'); ?>" ><?php echo htmlentities($li['tname']); ?></a></td>
                <td>
                  <?php if($li['ist'] == 1): ?>
                  <a href="javascript:void(0);" onclick="isdo('确定要隐藏吗？','<?php echo Url::build('admin/Cate/ajaxCate',['id'=>$li['id'],'tid'=>$li['tid'],'do'=>'qxtj']); ?>',this);">
                    <i class="fa fa-check"> 是</i>
                  </a>
                  <?php else: ?>
                  <a href="javascript:void(0);"  onclick="isdo('确定要显示吗？','<?php echo Url::build('admin/Cate/ajaxCate',['id'=>$li['id'],'tid'=>$li['tid'],'do'=>'tj']); ?>',this);">
                    <i class="fa fa-ban"> 否</i>
                  </a>
                  <?php endif; ?>
                </td>
                <td><input style="text-align: center;" type="text" tipvalue="cateordertip<?php echo htmlentities($i); ?>" size="3" value="<?php echo htmlentities($li['orders']); ?>" onblur="isdo('','<?php echo Url::build('admin/Cate/ajaxCate',['id'=>$li['id'],'tid'=>$li['tid'],'do'=>'order']); ?>',this);"/> <span class="icon icon-cateordertip<?php echo htmlentities($i); ?> margin-small" ></span></td>
                <td><?php echo htmlentities($li['addtime']); ?></td>
                <td><a href="<?php echo Url::build('admin/Cate/addCate',['id'=>$li['id'],'tid'=>$li['tid']]); ?>"><i class="fa fa-edit"></i> 修改</a>&nbsp;&nbsp;  <a href="javascript:void(0);" onclick="isdel('您确定要删除这个分类吗？','<?php echo Url::build('admin/Cate/delCate',['id'=>$li['id'],'tid'=>$li['tid']]); ?>');"><i class="fa fa-trash-o"></i> 删除</a></td>
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
                  <?php echo $lists['page']; ?>
                </div>
              </div>
            </div>