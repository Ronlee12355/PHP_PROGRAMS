<main style="margin-top: 0.1%;">
	<div class="container">
		<h3 class="center-align">请修改用户密码</h3>
		<div class="divider"></div>
		<div class="row">
			<p style="font-size: 1.4em;font-weight: 600;">用户名：<?=$one_user['user_name']?></p>
		</div>
		<div class="row">
			<p style="font-size: 1.4em;font-weight: 600;">真实姓名：<?=$one_user['real_name']?></p>
		</div>
		<div class="row">
			<p style="font-size: 1.4em;font-weight: 600;">用户类型：<?=trans_user_type($one_user['user_type'])?></p>
		</div>
		<div class="container">
			<div class="row">
		    <form class="col s12" id="admin_form">		      		      		      		      		      
		      <div class="row">
			        <div class="col s6">
			          	密码:
			          <div class="input-field inline">
			            <input type="password" class="validate" name="password">			            
			          </div>
			        </div>
			        <div class="col s6">
			         	 再次输入密码:
			          <div class="input-field inline">
			            <input type="password" class="validate" name="repassword">
			          </div>
			        </div>
			      </div>			
	        <input type="hidden" value="set" name="action"/>
	        <input type="hidden" name="admin_id" value="<?=$one_user['admin_id']?>" />	        	
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
