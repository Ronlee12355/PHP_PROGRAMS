<main style="margin-top: 0.1%;">
	<div class="container">
		<h3 class="center">后台数据面板</h3>
		<p class="center-align"><span style="font-style: italic;">提供后台数据一览以及用户添加修改功能</span></p>
		<div class="row">
			<div class="col s4 m4 l4">
				<div class="row">
			      <div class="col s12">
			        <div class="card-panel light-blue accent-2">
			          <span class="white-text"><i class="fa fa-user-md fa-fw medium"></i><span style="font-size: 1.3em;">医生：<?=$all_doctor?></span>
			          </span>
			        </div>
			      </div>
			    </div>
			</div>
      		<div class="col s4 m4 l4">
      			<div class="row">
			      <div class="col s12">
			        <div class="card-panel  purple accent-2">
			          <span class="white-text"><i class="fa fa fa-user-circle fa-fw medium"></i><span style="font-size: 1.3em;">数据上传人员：<?=$all_upload?></span>
			          </span>
			        </div>
			      </div>
			    </div>
      		</div>
            <div class="col s4 m4 l4">
            	<div class="row">
			      <div class="col s12">
			        <div class="card-panel orange darken-1">
			          <span class="white-text"><i class="fa fa fa-file-text-o fa-fw medium"></i><span style="font-size: 1.3em;">样本总数：<?=$all_sample?></span>
			          </span>
			        </div>
			      </div>
			    </div>
            </div>
		</div>
	</div>
	<div class="container">
		<p>
		   <a class="waves-effect waves-light btn green" href="/Admin/index.php?action=add"><i class="fa fa-plus fa-fw"></i>添加新用户</a>
		</p>
		<table class="responsive-table highlight bordered">
	        <thead>	          
	          <tr>
	          	  <th data-field="">存储编号</th>	             
	              <th data-field="">用户名</th>
	              <th data-field="">真实姓名</th>
	              <th data-field="">用户类型</th>
	              <th data-field="">状态</th>	              
	              <th data-field="">操作</th>
	          </tr>
	        </thead>	
	        <tbody>
	        	<?php 
	          	foreach($res as $k=>$v){	          		
				?>
				<tr>
				<td><?php echo $v['admin_id'];?></td>
	            <td><?php echo $v['user_name'];?></td>
	            <td><?php echo $v['real_name'];?></td>
	            <td><?php echo trans_user_type($v['user_type']);?></td>
	            <td><?php echo $v['status'] == 1?'有效':'无效';?></td>	            
	            <td>
	            	<a class="waves-effect waves-light btn" href="/Admin/index.php?action=set&id=<?=$v['admin_id']?>"><i class="fa fa-edit fa-fw"></i>重置密码</a>
	            	<a class="waves-effect waves-light btn admin_delete" attr-id="<?=$v['admin_id']?>"><i class="fa fa-close fa-fw"></i>注销</a>
	            </td>	            
	          </tr>	
			  <?php
	          	}
	          	?>          	          
	        </tbody>
     </table>          
	</div>
</main>