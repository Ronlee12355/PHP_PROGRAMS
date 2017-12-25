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
			<li><a href="#">个人参数修改</a></li>		
		</ol>
		<div class="panel panel-primary">
		    <div class="panel-heading">
		        <h3 class="panel-title">个人参数修改</h3>
		    </div>
		    <div class="panel-body">
		        <form class="form-horizontal" id="pso_form">		            		            
		            <div class="form-group">
		            	<input type="hidden" name="id" value="<?php echo ($res['id']); ?>"/>
		              <label for="smtp" class="col-md-2 control-label">Name</label>
		              <div class="col-md-10">
		                <input type="text" class="form-control" id="smtp" value="<?php echo ($res['username']); ?>" name="username">
		              </div>
		            </div>
		            <div class="form-group">
		              <label for="user_name" class="col-md-2 control-label">Email</label>
		              <div class="col-md-10 form-div">
		                <input type="text" class="form-control" id="user_name" value="<?php echo ($res['email']); ?>" name="email">
		              </div>
		            </div>
		            <div class="form-group">
		              <label for="password" class="col-md-2 control-label">Designation</label>
		              <div class="col-md-10 form-div">
		                <input type="text" class="form-control" id="password" value="<?php echo ($res['designation']); ?>" name="designation">
		              </div>
		            </div>
		            <div class="form-group">
		              <label for="portnum" class="col-md-2 control-label">Institution</label>
		              <div class="col-md-10 form-div">
		                <input type="text" class="form-control" id="portnum" name="institution" value="<?php echo ($res['institution']); ?>">
		              </div>
		            </div>
		            <div class="form-group">
		              <label for="sender" class="col-md-2 control-label">Address</label>
		              <div class="col-md-10 form-div">
		                <input type="text" class="form-control" id="sender" name="address" value="<?php echo ($res['address']); ?>">
		              </div>
		            </div>
		            <div class="form-group">
		              <label for="mail" class="col-md-2 control-label">注册时间</label>
		              <div class="col-md-10 form-div">
		                <input type="text" class="form-control" id="mail" name="register_time" value="<?php echo (date('Y-m-d H:i:s',$res['register_time'])); ?>">
		              </div>
		            </div>
		            <div class="form-group">
		              <label class="col-md-2 control-label">激活</label>
		              <div class="col-md-10 form-div">		                
		                <label class="radio-inline">
		                  <input type="radio" name="status" value="1" <?php if($res["status"] == 1): ?>checked="checked"<?php endif; ?>>已激活
		                </label>
		                <label class="radio-inline">
		                  <input type="radio" name="status" value="0" <?php if($res["status"] == 0): ?>checked="checked"<?php endif; ?>>未激活
		                </label>
		              </div>
		              </div>
		              <div class="form-group">
		              <label class="col-md-2 control-label">审核</label>
		              <div class="col-md-10 form-div">		                
		                <label class="radio-inline">
		                  <input type="radio" name="verify" value="1" <?php if($res["verify"] == 1): ?>checked="checked"<?php endif; ?>>已审核
		                </label>
		                <label class="radio-inline">
		                  <input type="radio" name="verify" value="0" <?php if($res["verify"] == 0): ?>checked="checked"<?php endif; ?>>未审核
		                </label>
		              </div>		            
		            </div>
          		</form>
          		<div class="text-center">
          			<button class="btn btn-default" type="button" id="pso_submit">修改</button>		            
		            <a href="/PSO/index.php/Admin/User/index"><button class="btn btn-default" type="button">返回</button></a>
          		</div>
		    </div>
		</div>
	</div>
	<script type="text/javascript">
		var SCOPE={
			'edit_url':'/PSO/index.php/Admin/User/doEdit',			
			'jump_url':'/PSO/index.php/Admin/User/index'
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