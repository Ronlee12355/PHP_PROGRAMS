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
			<li><a href="/PSO/index.php/Admin/User/index">所有用户</a></li>		
		</ol>
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title">操作选项</h3>
			</div>
			<div class="panel-body">
				<form class="form-inline" role="form" action="/PSO/index.php/Admin/User/index" method="get">
					<div class="form-group">
						<label for="name">选择列表</label>
					    <select class="form-control" name="type">
					      <option value="id">用户ID</option>
					      <option value="username">用户姓名</option>
					      <option value="email">邮箱</option>					      
					    </select>
					</div>
				  <div class="form-group">
				    <label class="sr-only" for="name">名称</label>
				    <input type="text" class="form-control" id="name" placeholder="请输入名称" name="name">
				  </div>								  
				  <button type="submit" class="btn btn-default">提交</button>
				</form>
			</div>
		</div>
		<div class="panel panel-primary">
		    <div class="panel-heading">
		        <h3 class="panel-title">个人会员管理列表</h3>
		    </div>
		    <div class="panel-body text-center">
		        <table class="table table-bordered table-condensed">				  
				  <thead>
				    <tr>
				      <th class="text-center">ID</th>
				      <th class="text-center">Name</th>
				      <th class="text-center">Email</th>
				      <th class="text-center">审核</th>
				      <th class="text-center">激活</th>
				      <th class="text-center">操作</th>
				    </tr>
				  </thead>
				  <tbody>				  	
				  	<?php if(is_array($user)): $i = 0; $__LIST__ = $user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
				      <td><?php echo ($vo["id"]); ?></td>
				      <td><?php echo ($vo["username"]); ?></td>
				      <td><?php echo ($vo["email"]); ?></td>
				      <td><?php echo (get_status($vo["verify"])); ?></td>
				      <td><?php echo (get_status($vo["status"])); ?></td>
				      <td>
				      	<p class="text-center">
				      		<a href="javascript:void(0)" class="pso_edit" attr-id="<?php echo ($vo["id"]); ?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>&nbsp;修改</a> |				  	
				      		<a href="javascript:void(0)" class="pso_delete" attr-id="<?php echo ($vo["id"]); ?>" attr-message="删除"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>&nbsp;删除</a>
				      	</p>
				      </td>
				    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
				  </tbody>
				</table>
		    </div>
		</div>
	</div>
	<script type="text/javascript">
		var SCOPE={
			'edit_url':'/PSO/index.php/Admin/User/edit',
			'delete_url':'/PSO/index.php/Admin/User/delete',
			'jump_url':'/PSO/index.php/Admin/User/index',
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