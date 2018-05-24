<main style="margin-top: 0.1%;">
	<div class="container">
		<h3 class="center">病人表达谱数据上传界面</h3>
		<p class="center-align"><span style="font-style: italic;">提供病人信息的添加，删除，查看以及编辑功能</span></p>
		<div class="row">
			<div class="row">
		    <form class="col s12" method="get" action="/Operator/index.php">	     	      
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
		<p><a class="btn red">一共有<?php echo count($res);?>例样本</a>
		   <!--<a class="waves-effect waves-light btn green" href="/Doctor/insert.php?action=add"><i class="fa fa-plus fa-fw"></i>添加新样本</a>-->
		</p>
		<table class="responsive-table highlight bordered">
	        <thead>	          
	          <tr>
	          	  <th data-field="">存储编号</th>	             
	              <th data-field="">姓名</th>	
	              <th data-field="">身份证号</th>	               
	              <th data-field="">是否已上传数据</th>
				  <th data-field="">是否已上传对照数据</th>
	              <th data-field="">数据是否公开</th>
	              <th data-field="">操作</th>
	          </tr>
	        </thead>	
	        <tbody>
	        	<?php 
	          	foreach($res as $k=>$v){
					$store=$pdo->query('SELECT * FROM pm_store WHERE status=1 AND diagnosis_id='.$v['diagnosis_id'])->fetch();
					if($store){
				?>
					<tr>
						<td><?php echo $v['diagnosis_id'];?></td>
			            <td><?php echo $v['username'];?></td>
			            <td><?php echo $v['ID_card'];?></td>	            
			            <td><i class="fa fa-check fa-fw"></i></td>
						<td><?php echo $store['control']?'<i class="fa fa-check fa-fw">':'<i class="fa fa-close fa-fw">';?></i></td>
			            <td><?php echo $store['access']=='是'?'<i class="fa fa-check fa-fw">':'<i class="fa fa-close fa-fw">';?></i></td>
			            <td>
			            	<!--<a class="waves-effect waves-light btn" href="/Doctor/insert.php?action=edit&id=<?php echo $v['diagnosis_id'];?>"><i class="fa fa-upload fa-fw"></i>上传</a>-->
			            	<a class="waves-effect waves-light btn operator_delete" attr-id="<?=$store['case_id']?>" attr-card="">
			            		<i class="fa fa-close fa-fw"></i>删除</a>
			            </td>	            
			          </tr>	
				<?php		
					}else{						
				?>
					  <tr>
						<td><?php echo $v['diagnosis_id'];?></td>
			            <td><?php echo $v['username'];?></td>
			            <td><?php echo $v['ID_card'];?></td>	            
			            <td><i class="fa fa-close fa-fw"></i></td>
						  <td><i class="fa fa-close fa-fw"></i></td>
			            <td><i class="fa fa-close fa-fw"></i></td>
			            <td>
			            	<a class="waves-effect waves-light btn" href="/Operator/index.php?action=add&id=<?php echo $v['diagnosis_id'];?>&name=<?php echo $v['username'];?>&ID=<?=$v['ID_card']?>">
			            		<i class="fa fa-upload fa-fw"></i>上传</a>			            	
			            </td>	            
			          </tr>	
				<?php		
					}
	          	}
	          	?>          	          
	        </tbody>
     </table>          
	</div>
</main>