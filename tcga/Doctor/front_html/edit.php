<main style="margin-top: 0.1%;">
	<div class="container">
		<h3 class="center-align">请输入相关病人信息</h3>
		<div class="divider"></div>
		<div class="row">
		    <form class="col s12" id="info_form">
		      <div class="row">
			        <div class="col s6">
			          	请输入姓名:
			          <div class="input-field inline">
			            <input id="email" type="text" class="validate" name="username" value="<?php echo $edit_data['username'];?>">
			            <!--<label for="email" data-error="wrong" data-success="right">邮件</label>-->
			          </div>
			        </div>
			        <div class="col s6">
			         	 请输入年龄:
			          <div class="input-field inline">
			            <input id="email" type="number" class="validate" name="age" value="<?php echo $edit_data['age'];?>">
			            <!--<label for="email" data-error="wrong" data-success="right">邮件</label>-->
			          </div>
			        </div>
			      </div>		      
		      <div class="row">
		        <div class="input-field col s6">
		        	性别:
		          <?php
		          	if($edit_data['gender'] == '男'){
		          		echo <<<EOF
		          		<input name="gender" type="radio" id="test1" value="男" checked="checked"/>
      			  		<label for="test1">男</label>    								
      			  		<input name="gender" type="radio" id="test2" value="女"/>
      			  		<label for="test2">女</label>
EOF;
		          	}else{
		          		echo <<<EOF
		          		<input name="gender" type="radio" id="test1" value="男"/>
      			  		<label for="test1">男</label>    								
      			  		<input name="gender" type="radio" id="test2" value="女" checked="checked"/>
      			  		<label for="test2">女</label>
EOF;
		          	}
		          	?>
		        </div>		    
		        <div class="input-field col s6">
			         	 请输入住院号:
			          <div class="input-field inline">
			            <input type="text" class="validate" name="number_hospital" value="<?php echo $edit_data['number_hospital'];?>">			            
			          </div>
			        </div>
		      </div>
		      <div class="row">
			        <div class="col s6">
			          	请输入身份证号:
			          <div class="input-field inline">
			            <input type="text" class="validate" name="ID_card" value="<?php echo $edit_data['ID_card'];?>">
			            <!--<label for="email" data-error="wrong" data-success="right">邮件</label>-->
			          </div>
			        </div>
			        <div class="col s6">
			        	选择医院:
			         	 <select name="hospital">
			         	 	<?php
			         	 		foreach (array("黄陂妇幼保健院","武汉市中南医院","湖北省肿瘤医院","武汉市协和医院","武汉市同济医院") as $value) {
			         	 			if($edit_data['hospital'] == $value){
			         	 				echo '<option value="'.$value.'" selected="selected">'.$value.'</option>';
			         	 			}else{
			         	 				echo '<option value="'.$value.'">'.$value.'</option>';
			         	 			}
			         	 		}			         	 		
			         	 		?>			         	  				      					      
					    </select>
					    <!--<label>Materialize 下拉列表</label>-->
			        </div>
			      </div>	
		      <div class="row">
		        <div class="col s6">
			        	癌症分型:
			         	 <select name="cancer_type">
			         	 	<?php
			         	 		foreach (array("肺鳞癌","肺腺癌","小细胞肺癌","大细胞肺癌","类癌","细支气管肺泡癌","其他") as $value) {
			         	 			if($edit_data['cancer_type'] == $value){
			         	 				echo '<option value="'.$value.'" selected="selected">'.$value.'</option>';
			         	 			}else{
			         	 				echo '<option value="'.$value.'">'.$value.'</option>';
			         	 			}
			         	 		}			         	 		
			         	 		?>							      					      
					    </select>					    
			        </div>
			        <div class="col s6">
			        	抽烟史:
			         	 <select name="smoke_year">
			         	 	<?php
			         	 		foreach (array("无","5年以下","5-10年","10-20年","20-30年","30-40年","40年以上") as $value) {
			         	 			if($edit_data['smoke_year'] == $value){
			         	 				echo '<option value="'.$value.'" selected="selected">'.$value.'</option>';
			         	 			}else{
			         	 				echo '<option value="'.$value.'">'.$value.'</option>';
			         	 			}
			         	 		}			         	 		
			         	 		?>					      
					    </select>					    
			        </div>
		      </div>
		      <div class="row">
			        <div class="col s6">
			          	临床分期(TNM):
			          <div class="input-field inline">
			            <input type="text" class="validate" name="TNM" value="<?php echo $edit_data['TNM'];?>">			            
			          </div>
			        </div>
			        <div class="col s6">
			         	 病理分期(PTMN):
			          <div class="input-field inline">
			            <input id="email" type="text" class="validate" name="PTNM" value="<?php echo $edit_data['PTNM'];?>">
			            
			          </div>
			        </div>
			      </div>
			<div class="row">
				诊断描述:
	          <div class="input-field col s12">
	            <textarea class="materialize-textarea" name="diagnosis_desc"><?php echo str_replace('<br />', "\r\n", $edit_data['diagnosis_desc']);?></textarea>
	            
	          </div>
	        </div>
	        <div class="row">
				手术情况描述:
	          <div class="input-field col s12">
	            <textarea class="materialize-textarea" name="operation_desc"><?php echo str_replace('<br />', "\r\n",$edit_data['operation_desc']);?></textarea>
	           
	          </div>
	        </div>
	        <div class="row">
				既往病史:
	          <div class="input-field col s12">
	            <textarea class="materialize-textarea" name="formal_disease"><?php echo str_replace('<br />', "\r\n",$edit_data['formal_disease']);?></textarea>
	            
	          </div>
	        </div>
	        <div class="row">
				化疗史:
	          <div class="input-field col s12">
	            <textarea class="materialize-textarea" name="chem_treat"><?php echo str_replace('<br />', "\r\n",$edit_data['chem_treat']);?></textarea>
	           
	          </div>
	        </div>
	        <div class="row">
				放疗史:
	          <div class="input-field col s12">
	            <textarea class="materialize-textarea" name="x_treat"><?php echo str_replace('<br />', "\r\n",$edit_data['x_treat']);?></textarea>
	            
	          </div>
	        </div>
	        <div class="row">
				药物治疗方案:
	          <div class="input-field col s12">
	            <textarea class="materialize-textarea" name="drug_treat"><?php echo str_replace('<br />', "\r\n",$edit_data['drug_treat']);?></textarea>
	            
	          </div>
	        </div>
	        <div class="row">
				化疗后状态:
	          <div class="input-field col s12">
	            <textarea class="materialize-textarea" name="after_x_treat"><?php echo str_replace('<br />', "\r\n",$edit_data['after_x_treat']);?></textarea>
	            
	          </div>
	        </div>
	        <div class="row">
	        	<div class="col s4">
			         	 确诊时间:
			          <div class="input-field inline">
			            <input type="datetime" class="datepicker" name="time_confirm" value="<?php echo $edit_data['time_confirm'];?>">
			           
			          </div>
			        </div>
		        <div class="input-field col s4">
		        	是否死亡:
		        	<?php
		        		if($edit_data['died'] == '是'){
		        			
		        			echo '<input name="died" type="radio" id="t1" value="是" checked="checked"/>
      			  				<label for="t1">是</label>    								
      			    			<input name="died" type="radio" id="t2" value="否"/>
      			  				<label for="t2">否</label>';
		        		}else{
		        			echo '<input name="died" type="radio" id="t1" value="是"/>
				      			  <label for="t1">是</label>    								
				      			  <input name="died" type="radio" id="t2" checked="checked" value="否"/>
				      			  <label for="t2">否</label>';
		        		}		        		
		        		?>		        	
		          
		        </div>
		        <div class="col s4">
			         	 死亡时间:
			          <div class="input-field inline">
			            <input type="datetime" class="datepicker" name="time_dead" value="<?php echo $edit_data['time_dead'];?>">
			            
			          </div>
			        </div>
		      </div>
		      <div class="row">
				死亡原因:
	          <div class="input-field col s12">
	            <textarea class="materialize-textarea" name="dead_reason"><?php echo str_replace('<br />', "\r\n",$edit_data['dead_reason']);?></textarea>	            
	          </div>
	        </div>
	        <input type="hidden" value="edit" name="action"/>
	        <input type="hidden" name="user_id" value="<?php echo $edit_data['user_id'];?>" />
	        <input type="hidden" name="diagnosis_id" value="<?php echo $edit_data['diagnosis_id'];?>" />	        	
		    </form>
		    <button class="btn waves-effect waves-light right" type="button" name="tcga_edit">提交
			    <i class="material-icons right">send</i>
			  </button>
			 <a href="/Doctor/insert.php" class="white-text btn"><i class="fa fa-arrow-left fa-fw"></i>&nbsp;&nbsp;取消</a>		  
  		</div>
	</div>
</main>