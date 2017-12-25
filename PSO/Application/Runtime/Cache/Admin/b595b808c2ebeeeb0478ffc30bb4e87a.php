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
			<li><a href="/PSO/index.php/Admin/Index/index">欢迎</a></li>		
		</ol>
		<div class="panel panel-primary">
		    <div class="panel-heading">
		        <h3 class="panel-title">系统信息</h3>
		    </div>
		    <div class="panel-body">
		        <div class="row">
		        	<div class="col-md-3">
		        		<img src="/PSO/Public/img/computer.png" class="img-responsive"/>
		        	</div>
		        	<div class="col-md-9">
		        		<ul class="list-group">
						    <li class="list-group-item">服务器解译引擎:&nbsp;<strong><?php echo ($arr['SERVER_SOFTWARE']); ?></strong></li>
						    <li class="list-group-item">客户机浏览器:&nbsp;<strong><?php echo ($arr['HTTP_USER_AGENT']); ?></strong></li>
						    <li class="list-group-item">php版本:&nbsp;<strong><?php echo ($arr['PHP_VERSION']); ?></strong></li>
						    <li class="list-group-item">MySQL版本:&nbsp;<strong><?php echo ($arr['MYSQL_VERSION']); ?></strong></li>
						    <li class="list-group-item">主机地址:&nbsp;<strong><?php echo ($arr['REMOTE_ADDR']); ?></strong></li>					    
						</ul>
		        	</div>
		        </div>
		    </div>
		</div>
	</div>
<script src="/PSO/Public/js/jquery-2.0.0.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="/PSO/Public/bootstrap/js/bootstrap.min.js"></script>
<script src="/PSO/Public/js/layer/layer.js" type="text/javascript" charset="utf-8"></script>
<script src="/PSO/Public/js/admin.js" type="text/javascript" charset="utf-8"></script>
<script src="/PSO/Public/js/dialog.js" type="text/javascript" charset="utf-8"></script>
<script src="/PSO/Public/js/jquery.cookie.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>