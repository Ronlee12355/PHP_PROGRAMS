<main style="margin-top: 0.1%;">
	<div class="container">
		<h3 class="center-align">请输入用户信息</h3>
		<div class="divider"></div>
		
		<div class="container">
			<div class="row">
		    <form class="col s12" id="admin_form">
		      <div class="row">
			        <div class="col s6">
			          	请输入用户名:
			          <div class="input-field inline">
			            <input id="email" type="text" class="validate" name="user_name">
			            <!--<label for="email" data-error="wrong" data-success="right">邮件</label>-->
			          </div>
			        </div>
			        <div class="col s6">
			         	 请输入真实姓名:
			          <div class="input-field inline">
			            <input id="email" type="text" class="validate" name="real_name">
			            <!--<label for="email" data-error="wrong" data-success="right">邮件</label>-->
			          </div>
			        </div>
			      </div>		      
		      <div class="row">
		        <div class="input-field col s6">
		        	用户类型:
		          <input name="user_type" type="radio" id="test1" value="0" checked="checked"/>
      			  <label for="test1">医生</label>    								
      			  <input name="user_type" type="radio" id="test2" value="2"/>
      			  <label for="test2">数据上传人员</label>
      			  <input name="user_type" type="radio" id="test3" value="1"/>
      			  <label for="test3">测序公司</label>
		        </div>
		        <div class="col s6">
			         	 状态:
			          	<input name="status" type="radio" id="t1" value="1" checked="checked"/>
      			  		<label for="t1">开启</label>    								
      			  		<input name="status" type="radio" id="t2" value="0"/>
      			  		<label for="t2">关闭</label>
			        </div>
		      </div>		      		      
		      <div class="row">
			        <div class="col s6">
			          	密码:
			          <div class="input-field inline">
			            <input type="password" class="validate" name="password">
			            <!--<label for="email" data-error="wrong" data-success="right">TNM</label>-->
			          </div>
			        </div>
			        <div class="col s6">
			         	 再次输入密码:
			          <div class="input-field inline">
			            <input type="password" class="validate" name="repassword">
			          </div>
			        </div>
			      </div>			
	        <input type="hidden" value="add" name="action"/>	        	
		    </form>
		    <div class="center-align">
		    	<button class="btn waves-effect waves-light" type="button" name="admin_submit">提交
			    <i class="material-icons right">send</i>
			  </button>
		    </div>
  		</div>
		</div>
	</div>
</main>
