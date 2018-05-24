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
			            <input id="email" type="text" class="validate" name="username">
			            <!--<label for="email" data-error="wrong" data-success="right">邮件</label>-->
			          </div>
			        </div>
			        <div class="col s6">
			         	 请输入年龄:
			          <div class="input-field inline">
			            <input id="email" type="number" class="validate" name="age">
			            <!--<label for="email" data-error="wrong" data-success="right">邮件</label>-->
			          </div>
			        </div>
			      </div>		      
		      <div class="row">
		        <div class="input-field col s6">
		        	性别:
		          <input name="gender" type="radio" id="test1" value="男" checked="checked"/>
      			  <label for="test1">男</label>    								
      			  <input name="gender" type="radio" id="test2" value="女"/>
      			  <label for="test2">女</label>
		        </div>
		        <div class="col s6">
			         	 请输入住院号:
			          <div class="input-field inline">
			            <input type="text" class="validate" name="number_hospital">
			            <!--<label for="email" data-error="wrong" data-success="right">邮件</label>-->
			          </div>
			        </div>
		      </div>
		      <div class="row">
			        <div class="col s6">
			          	请输入身份证号:
			          <div class="input-field inline">
			            <input type="text" class="validate" name="ID_card">
			            <!--<label for="email" data-error="wrong" data-success="right">邮件</label>-->
			          </div>
			        </div>
			        <div class="col s6">
			        	选择医院:
			         	 <select name="hospital">
			         	  <option value="黄陂妇幼保健院">黄陂妇幼保健院</option>					      
					      <option value="武汉市中南医院">武汉市中南医院</option>
					      <option value="湖北省肿瘤医院">湖北省肿瘤医院</option>
					      <option value="武汉市协和医院">武汉市协和医院</option>
					      <option value="武汉市同济医院">武汉市同济医院</option>
					    </select>
					    <!--<label>Materialize 下拉列表</label>-->
			        </div>
			      </div>	
		      <div class="row">
		        <div class="col s6">
			        	癌症分型:
			         	 <select name="cancer_type">					      
					      <option value="肺鳞癌">肺鳞癌</option>
					      <option value="肺腺癌">肺腺癌</option>
					      <option value="小细胞肺癌">小细胞肺癌</option>
					      <option value="大细胞肺癌">大细胞肺癌</option>
					      <option value="类癌">类癌</option>
					      <option value="细支气管肺泡癌">细支气管肺泡癌</option>
					      <option value="其他">其他</option>
					    </select>					    
			        </div>
			        <div class="col s6">
			        	抽烟史:
			         	 <select name="smoke_year">
					      <option value="无">无</option>
					      <option value="5年以下">5年以下</option>
					      <option value="5-10年">5-10年</option>
					      <option value="10-20年">10-20年</option>
					      <option value="20-30年">20-30年</option>
					      <option value="30-40年">30-40年</option>
					      <option value="40年以上">40年以上</option>
					    </select>					    
			        </div>
		      </div>
		      <div class="row">
			        <div class="col s6">
			          	临床分期(TNM):
			          <div class="input-field inline">
			            <input type="text" class="validate" name="TNM">
			            <!--<label for="email" data-error="wrong" data-success="right">TNM</label>-->
			          </div>
			        </div>
			        <div class="col s6">
			         	 病理分期(PTMN):
			          <div class="input-field inline">
			            <input id="email" type="text" class="validate" name="PTNM">
			            <!--<label for="email" data-error="wrong" data-success="right">PTMN</label>-->
			          </div>
			        </div>
			      </div>
			<div class="row">
				诊断描述:
	          <div class="input-field col s12">
	            <textarea class="materialize-textarea" name="diagnosis_desc"></textarea>
	            <!--<label for="textarea1">诊断描述</label>-->
	          </div>
	        </div>
	        <div class="row">
				手术情况描述:
	          <div class="input-field col s12">
	            <textarea class="materialize-textarea" name="operation_desc"></textarea>
	            <!--<label for="textarea1">手术情况描述</label>-->
	          </div>
	        </div>
	        <div class="row">
				既往病史:
	          <div class="input-field col s12">
	            <textarea class="materialize-textarea" name="formal_disease"></textarea>
	            <!--<label for="textarea1">诊断描述</label>-->
	          </div>
	        </div>
	        <div class="row">
				化疗史:
	          <div class="input-field col s12">
	            <textarea class="materialize-textarea" name="chem_treat"></textarea>
	            <!--<label for="textarea1">手术情况描述</label>-->
	          </div>
	        </div>
	        <div class="row">
				放疗史:
	          <div class="input-field col s12">
	            <textarea class="materialize-textarea" name="x_treat"></textarea>
	            <!--<label for="textarea1">诊断描述</label>-->
	          </div>
	        </div>
	        <div class="row">
				药物治疗方案:
	          <div class="input-field col s12">
	            <textarea class="materialize-textarea" name="drug_treat"></textarea>
	            <!--<label for="textarea1">手术情况描述</label>-->
	          </div>
	        </div>
	        <div class="row">
				化疗后状态:
	          <div class="input-field col s12">
	            <textarea class="materialize-textarea" name="after_x_treat"></textarea>
	            <!--<label for="textarea1">诊断描述</label>-->
	          </div>
	        </div>
	        <div class="row">
	        	<div class="col s4">
			         	 确诊时间:
			          <div class="input-field inline">
			            <input type="datetime" class="datepicker" name="time_confirm">
			            <!--<label for="email" data-error="wrong" data-success="right">死亡时间</label>-->
			          </div>
			        </div>
		        <div class="input-field col s4">
		        	是否死亡:
		          <input name="died" type="radio" id="t1" value="是"/>
      			  <label for="t1">是</label>    								
      			  <input name="died" type="radio" id="t2" checked="checked" value="否"/>
      			  <label for="t2">否</label>
		        </div>
		        <div class="col s4">
			         	 死亡时间:
			          <div class="input-field inline">
			            <input type="datetime" class="datepicker" name="time_dead">
			            <!--<label for="email" data-error="wrong" data-success="right">死亡时间</label>-->
			          </div>
			        </div>
		      </div>
		      <div class="row">
				死亡原因:
	          <div class="input-field col s12">
	            <textarea class="materialize-textarea" name="dead_reason"></textarea>
	            <!--<label for="textarea1">诊断描述</label>-->
	          </div>
	        </div>
	        <input type="hidden" value="add" name="action"/>	        	
		    </form>
		    <button class="btn waves-effect waves-light right" type="button" name="tcga_submit">提交
			    <i class="material-icons right">send</i>
			  </button>
  		</div>
	</div>
</main>
