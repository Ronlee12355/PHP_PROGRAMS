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
		<li><a href="/PSO/index.php/Admin/About/index">栏目配置</a></li>		
	</ol>
	<div class="panel panel-danger">
		<div class="panel-heading">
			<h3 class="panel-title">栏目配置参数</h3>
		</div>
		<div class="panel-body">
			<form class="form-horizontal" id="pso_form">
				<div class="form-group">
						<label for="inputname" class="col-sm-2 control-label">网站文件:</label>
						<div class="col-sm-5">
							<input id="pdf_upload"  type="file" multiple="true" name="file">							
							<input id="file_upload_pdf" name="upload_file" type="hidden" multiple="true" value="">
						</div>
					</div>
					<div class="form-group">
						<label for="inputname" class="col-sm-2 control-label">缩图:</label>
						<div class="col-sm-5">
							<input id="file_upload"  type="file" multiple="true" name="pdf_file">
							<img style="display: none" id="upload_org_code_img" src="" width="150" height="150">
							<input id="file_upload_image" name="upload_img" type="hidden" multiple="true" value="">
						</div>
					</div>
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">网站简介描述:</label>
						<div class="col-sm-10">
							<script id="content" name="upload_text" type="text/plain"></script>
						</div>
					</div>				
			</form>
			<p class="text-center"><button class="btn btn-default btn-lg" id="pso_submit">提交</button>
				<a href="/PSO/index.php/Admin/About/index"><button class="btn btn-default btn-lg">返回</button></a>
			</p>
		</div>
	</div>
</div>
<script type="text/javascript">
	var SCOPE={
		'edit_url':'/PSO/index.php/Admin/About/saveFile',
		'jump_url':'/PSO/index.php/Admin/About/index',		
		'ajax_upload_image_url' : '/PSO/index.php/Admin/Image/ajaxuploadimage',
		'ajax_upload_swf' : '/PSO/Public/js/uploadify.swf',
		'ajax_upload_pdf_url':'/PSO/index.php/Admin/Image/ajaxuploadpdf',
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
<script src="/PSO/Public/js/image.js" type="text/javascript" charset="utf-8"></script>
<script src="/PSO/Public/js/jquery.uploadify.js" type="text/javascript" charset="utf-8"></script>
<script src="/PSO/Public/Ueditor/ueditor.config.js" type="text/javascript" charset="utf-8"></script>
<script src="/PSO/Public/Ueditor/ueditor.all.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
	var ue=UE.getEditor('content',{
		initialFrameHeight: 300
	}).getContentTxt();
</script>