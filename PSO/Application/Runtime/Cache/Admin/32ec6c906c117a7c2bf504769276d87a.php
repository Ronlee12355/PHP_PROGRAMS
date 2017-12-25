<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<meta name="Keywords" content="<?php echo ($f["keywords"]); ?>"/>
	<meta name="Description" content="<?php echo ($f["description"]); ?>"/>
	<title><?php echo ($f["title"]); ?></title>
	<link rel="stylesheet" type="text/css" href="/PSO/Public/bootstrap/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="/PSO/Public/css/admin_common.css"/>
	<link rel="stylesheet" type="text/css" href="/PSO/Public/css/uploadify.css"/>
	<link rel="stylesheet" type="text/css" href="/PSO/Public/css/morris.css"/>
	<!--[if lte IE 9]>
	<script src="/PSO/Public/js/html5.js" type="text/javascript"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
	    <div class="container-fluid">
		    <div class="navbar-header">
		        <a class="navbar-brand" href="/PSO/index.php/Admin/Index/index">银屑病药物平台后台管理系统</a>
		    </div>
	    <div>
	    	<?php if(session('is_login')): ?><ul class="nav navbar-nav">
	            <li class="dropdown">
	                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	                   	 首页<b class="caret"></b>
	                </a>
	                <ul class="dropdown-menu">	                    	                    
	                    <li><a href="/PSO/index.php/Admin/Index/index">欢迎</a></li>
	                    <li class="divider"></li>
	                    <li><a href="/PSO/index.php/Admin/Index/indexConfig">服务器配置</a></li>
	                </ul>
	            </li>
	            <li><a href="/PSO/index.php/Admin/Mailconfig/index">邮箱配置</a></li>
	            <li><a href="/PSO/index.php/Admin/User/index">会员管理</a></li>
	            <li><a href="/PSO/index.php/Admin/Basic/index">站点配置</a></li>
	            <li><a href="/PSO/index.php/Admin/About/index">栏目</a></li>
	        </ul>
	        
	        <ul class="nav navbar-nav navbar-right">
	        	<li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;<?php echo ($name); ?></a></li>
	        	<li><a href="/PSO/index.php/Home/Index/index" target="_blank"><span class="glyphicon glyphicon-info-sign"></span>&nbsp;&nbsp;前台</a></li>
	        	<li><a href="/PSO/index.php/Admin/Login/doLogOut"><span class="glyphicon glyphicon-log-out"></span>&nbsp;&nbsp;退出</a></li>
	        </ul><?php endif; ?>
	    </div>
	    </div>
	</nav>
	<div class="container" style="margin-top: 7%;">
		<div class="well well-lg">
			<div class="caption">
				<h1 align="center">Login</h1>
			</div>
			<form class="form-horizontal" role="form">
			  <div class="form-group">
			    <label for="username" class="col-sm-2 control-label">Username</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="username" placeholder="Your name" name="username">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="password" class="col-sm-2 control-label">Password</label>
			    <div class="col-sm-10">
			      <input type="password" class="form-control" id="password" placeholder="Your password" name="passwd">
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <div class="checkbox">
			        <label>
			          <input type="checkbox" name="rmPasswd" checked="checked">Remember the password
			        </label>
			      </div>
			    </div>
			  </div>		 
			</form>
			<p class="text-center"><button class="btn-lg btn-primary" onclick="login()">Login</button></p>
			<script type="text/javascript">
				var SCOPE={
			'save_url':'/PSO/index.php/Admin/Login/doLogin',
			'jump_url':'/PSO/index.php/Admin/Index/index',
		};
			</script>
		</div>
	</div>
	<script type="text/javascript">	
		$(function(){
			if($.cookie('rmbUser') == "true"){
				$('input[name="rmPasswd"]:checked');
				$('#username').val($.cookie('username'));
				$('#password').val($.cookie('password'));
			}
		});
		
		function login(){
			if ($('input[name="rmPasswd"]:checked')) {
				var str_username = $("#username").val();
				var str_password = $("#password").val();
				$.cookie("rmbUser", "true", { expires: 7 }); //存储一个带7天期限的cookie
				$.cookie("username", str_username, { expires: 7 });
				$.cookie("password", str_password, { expires: 7 });
			} else{
				$.cookie("rmbUser", "false", { expires: -1 });
				$.cookie("username", '', { expires: -1 });
				$.cookie("password", '', { expires: -1 });
			}
			
			var data = {};
			data['username']=$('#username').val();
			data['passwd']=$('#password').val();
			$.ajax({
				type:"post",
				url:SCOPE.save_url,
				async:true,
				data:data,
				success:function(res){
					if (res.status == 1) {
						return dialog.success(res.msg,SCOPE.jump_url);
					} else{
						return dialog.error(res.msg);
					}
				},
				dataType:'json',
			});
		}
	</script>
<script src="/PSO/Public/js/jquery-2.0.0.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="/PSO/Public/bootstrap/js/bootstrap.min.js"></script>
<script src="/PSO/Public/js/layer/layer.js" type="text/javascript" charset="utf-8"></script>
<script src="/PSO/Public/js/admin.js" type="text/javascript" charset="utf-8"></script>
<script src="/PSO/Public/js/dialog.js" type="text/javascript" charset="utf-8"></script>
<script src="/PSO/Public/js/jquery.cookie.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>