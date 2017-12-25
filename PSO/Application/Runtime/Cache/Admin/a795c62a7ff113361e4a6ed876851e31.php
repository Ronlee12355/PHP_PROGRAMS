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
	<div class="container">
		<ol class="breadcrumb">
			<li><a href="/PSO/index.php/Admin/Index/index">首页</a></li>
			<li><a href="/PSO/index.php/Admin/Mailconfig/index">邮箱参数设置</a></li>		
		</ol>
		<div class="panel panel-primary">
		    <div class="panel-heading">
		        <h3 class="panel-title">邮箱参数设置</h3>
		    </div>
		    <div class="panel-body">
		        <form class="form-horizontal">		            
		            <div class="form-group">
		              <label class="col-md-2 control-label">安全协议</label>
		              <div class="col-md-10 form-div">
		                <label class="radio-inline">
		                  <input type="radio" name="email_smtp_secure" value="" <?php if($res["email_smtp_secure"] == ''): ?>checked="checked"<?php endif; ?>>默认
		                </label>
		                <label class="radio-inline">
		                  <input type="radio" name="email_smtp_secure" value="ssl" <?php if($res["email_smtp_secure"] == ssl): ?>checked="checked"<?php endif; ?>>SSL
		                </label>
		                <label class="radio-inline">
		                  <input type="radio" name="email_smtp_secure" value="tls" <?php if($res["email_smtp_secure"] == tls): ?>checked="checked"<?php endif; ?>>TSL
		                </label>
		              </div>
		            </div>
		            <div class="form-group">
		              <label for="smtp" class="col-md-2 control-label">SMTP协议</label>
		              <div class="col-md-10">
		                <input type="text" class="form-control" id="smtp" value="<?php echo ($res['email_smtp']); ?>" name="email_smtp">
		              </div>
		            </div>
		            <div class="form-group">
		              <label for="user_name" class="col-md-2 control-label">用户名</label>
		              <div class="col-md-10 form-div">
		                <input type="text" class="form-control" id="user_name" value="<?php echo ($res['email_username']); ?>" name="email_username">
		              </div>
		            </div>
		            <div class="form-group">
		              <label for="password" class="col-md-2 control-label">密码</label>
		              <div class="col-md-10 form-div">
		                <input type="password" class="form-control" id="password" value="<?php echo ($res['email_password']); ?>" name="email_password">
		              </div>
		            </div>
		            <div class="form-group">
		              <label for="portnum" class="col-md-2 control-label">端口号</label>
		              <div class="col-md-10 form-div">
		                <input type="text" class="form-control" id="portnum" name="email_port" value="<?php echo ($res['email_port']); ?>">
		              </div>
		            </div>
		            <div class="form-group">
		              <label for="sender" class="col-md-2 control-label">发件人</label>
		              <div class="col-md-10 form-div">
		                <input type="text" class="form-control" id="sender" name="email_from_name" value="<?php echo ($res['email_from_name']); ?>">
		              </div>
		            </div>
		            <div class="form-group">
		              <label for="mail" class="col-md-2 control-label">接受测试的邮箱</label>
		              <div class="col-md-10 form-div">
		                <input type="text" class="form-control" id="mail" name="send_to">
		              </div>
		            </div>		            
          		</form>
          		<div class="text-center">
          			<button class="btn btn-default" type="button" onclick="edit()">修改</button>
		            <button class="btn btn-default" type="button" onclick="send()">测试邮件发送</button>
		            <a href="/PSO/index.php/Admin/Index/index"><button class="btn btn-default" type="button">返回</button></a>
          		</div>
		    </div>
		</div>
	</div>
	<script type="text/javascript">
		var SCOPE={
			'save_url':'/PSO/index.php/Admin/Mailconfig/edit',
			'jump_url':'/PSO/index.php/Admin/Mailconfig/index',
			'send_url':'/PSO/index.php/Admin/Mailconfig/sendTest',
		};
		function edit(){
			var data=$('form').serializeArray();
			var postData={};
			$(data).each(function(i){
				postData[this.name]=this.value;
			});
			$.ajax({
				type:"post",
				url:SCOPE.save_url,
				async:true,
				data:postData,
				success:function(res){
					if (res.status==1) {
						return dialog.success(res.msg,SCOPE.jump_url);
					} else{
						return dialog.error(res.msg);
					}
				},
				dataType:'json'
			});
		}
		function send(){
			var i;
			var data=$('form').serializeArray();
			var postData={};
			$(data).each(function(i){
				postData[this.name]=this.value;
			});
			$.ajax({
				type:"post",
				url:SCOPE.send_url,
				async:true,
				data:postData,
				beforeSend:function(){
					i=layer.load(0, {shade: false});
				},
				success:function(res){
					layer.close(i);
					if (res.status==1) {
						return dialog.success(res.msg,SCOPE.jump_url);
					} else{
						return dialog.error(res.msg);
					}
				},
				dataType:'json'
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