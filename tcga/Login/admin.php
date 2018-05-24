<?php
	session_start();
	error_reporting(0);
	if($_SESSION['is_admin'] == 'yes'){
		header('Location: /Admin');
		exit;
	}
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta name="renderer" content="webkit">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta http-equiv="X-UA-Compatible" content="IE=9" />
		<link rel="stylesheet" type="text/css" href="/public/js/layer/theme/default/layer.css"/>		
		<link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="/public/materialize/css/materialize.min.css"/>
		<link rel="stylesheet" type="text/css" href="/public/materialize/iconfont/material-icons.css"/>			
		<title>后台管理登录页面</title>
	</head>
	<body>
		<br />
		<div class="container">
			<div class="container">
				<div class="row">
					<div class="col s12">
				        <div class="card-panel pink darken-2 center">
				          <span class="white-text" style="font-size: 2em;font-style: italic;font-weight: 900;"><i class="fa fa-list-alt fa-fw"></i>登录理性精准用药后台管理
				          </span>
				        </div>
				    </div>
				    <br />
		        <div class="col s12">		        	
		          <div class="card hoverable grey lighten-4">
		            <div class="card-content">
		              <p style="text-align: center;"><span class="card-title" style="font-weight: bold;">后台管理系统登录</span></p>
		              <div class="divider"></div>
		              <br />		           
		              <form>
					      <div class="row">
					        <div class="input-field col s12">
					          <i class="material-icons prefix">account_circle</i>
					          <input id="icon_prefix" type="text" class="validate" name="user_name">
					          <label for="icon_prefix">用户名</label>
					        </div>
					        <div class="input-field col s12">
					          <i class="material-icons prefix">lock</i>
					          <input id="icon_telephone" type="password" class="validate" name="password">
					          <label for="icon_telephone">密码</label>
					        </div>					        							
					      </div>
					    </form>
		            </div>
		            <div class="card-action center">
		              <button class="btn waves-effect waves-light" type="button" name="admin_login">登录
					    <i class="fa fa-send fa-fw"></i>
					  </button>
		            </div>
		          </div>
		        </div>
		      </div>
			</div>
		</div>		
	</body>
		<script src="/public/js/jquery-2.0.0.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="/public/js/layer/layer.js" type="text/javascript" charset="utf-8"></script>
		<script src="/public/js/dialog.js" type="text/javascript" charset="utf-8"></script>
		<script src="/public/materialize/js/materialize.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="/public/js/admin.js" type="text/javascript" charset="utf-8"></script>		
</html>