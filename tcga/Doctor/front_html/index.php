<main style="margin-top: 0.1%;">
	<div class="container">
		<h3 class="center">病人信息编辑界面</h3>
		<p class="center-align"><span style="font-style: italic;">提供病人信息的添加，删除，查看以及编辑功能</span></p>
		<div class="row">
			<div class="row">
		    <form class="col s12" method="get" action="/Doctor/insert.php">	     	      
		      <div class="row">
		        <div class="input-field col s6">
		          <i class="material-icons prefix">search</i>		        	
		          <input id="password" type="text" class="validate" name="ID_card">
		          <label for="password">请输入身份证号</label>
		        </div>
		        <div class="input-field col s6">
		      		<input type="submit" class="btn green"/>
		      	</div>
		      </div>		      	      	      
		    </form>
		  </div>
		</div>
	</div>
	<div style="margin-left: 1%;">
		<p><a class="btn red">一共有<?php echo count($all_data);?>例样本</a>
		   <a class="waves-effect waves-light btn green" href="/Doctor/insert.php?action=add"><i class="fa fa-plus fa-fw"></i>添加新样本</a>
		</p>
		<table class="responsive-table highlight bordered">
	        <thead>	          
	          <tr>
	          	  <th data-field="">存储编号</th>	             
	              <th data-field="">姓名</th>
	              <th data-field="">癌症分型</th>
	              <th data-field="">TNM</th>
	              <th data-field="">PTNM</th>
	              <th data-field="">诊断描述</th>
	              <th data-field="">手术描述</th>
	              <th data-field="">是否死亡</th>
	              <th data-field="">最后更新时间</th>
	              <th data-field="">操作</th>
	          </tr>
	        </thead>	
	        <tbody>
	        	<?php 
	          	foreach($all_data as $k=>$v){	          		
				?>
				<tr>
				<td><?php echo $v['diagnosis_id'];?></td>
	            <td><?php echo $v['username'];?></td>
	            <td><?php echo $v['cancer_type'];?></td>
	            <td><?php echo $v['TNM'];?></td>
	            <td><?php echo $v['PTNM'];?></td>
	            <td><?php echo $v['diagnosis_desc'];?></td>
	            <td><?php echo $v['operation_desc'];?></td>
	            <td><?php echo $v['died'];?></td>
	            <td><?php echo date('Y-m-d H:i:s',$v['last_update']);?></td>
	            <td><a class="waves-effect waves-light btn" href="/Doctor/insert.php?action=edit&id=<?php echo $v['diagnosis_id'];?>"><i class="fa fa-eye fa-fw"></i>详情</a>
	            	<a class="waves-effect waves-light btn" href="/Doctor/insert.php?action=edit&id=<?php echo $v['diagnosis_id'];?>"><i class="fa fa-edit fa-fw"></i>修改</a>
	            	<a class="waves-effect waves-light btn tcga_delete" attr-id="<?php echo $v['diagnosis_id'];?>" attr-card="<?php echo $v['user_id'];?>"><i class="fa fa-close fa-fw"></i>删除</a>
	            </td>	            
	          </tr>	
			  <?php
	          	}
	          	?>          	          
	        </tbody>
     </table>          
	</div>
</main>