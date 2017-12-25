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
	<link rel="stylesheet" type="text/css" href="/PSO/Public/css/common.css"/>
	<!--[if lte IE 9]>
	<script src="/PSO/Public/js/html5.js" type="text/javascript"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-fixed-top navbar-inverse" role="navigation" style="-webkit-border-radius: 0px;-moz-border-radius: 0px;border-radius: 0px;">
		    <div class="container">
			    <div class="navbar-header">
			        <button type="button" class="navbar-toggle" data-toggle="collapse"
			                data-target="#example-navbar-collapse">
			            <span class="sr-only">切换导航</span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>			            
			        </button>
			        <a class="navbar-brand" href="">
			        	GeneRank based drug screen
			        </a>
			    </div>
			    <div class="collapse navbar-collapse" id="example-navbar-collapse">
			        <ul class="nav navbar-nav navbar-right">
			        	<li><a href="/PSO/index.php/Home/Index/index"><span class="glyphicon glyphicon-home"></span>&nbsp;Home</a></li>
			            <li><a href="/PSO/index.php/Home/Index/about"><span class="glyphicon glyphicon-info-sign"></span>&nbsp;About</a></li>
			            <?php if(session('member_id')): ?><li><a href="/PSO/index.php/Home/Index/showDownload"><span class="glyphicon glyphicon-download"></span>&nbsp;Download</a></li>			        
			            <li><a href="/PSO/index.php/Home/Login/loginOut"><span class="glyphicon glyphicon-eye-close"></span>&nbsp;DropOut</a></li>
			            <li><a href="/PSO/index.php/Home/Changepd/index"><span class="glyphicon glyphicon-lock"></span>&nbsp;Change Password</a></li>
			        	<?php else: ?>
			            <li><a href="/PSO/index.php/Home/Login/login"><span class="glyphicon glyphicon-user"></span>&nbsp;SignIn</a></li>
			            <li><a href="/PSO/index.php/Home/Login/signUp"><span class="glyphicon glyphicon-plus-sign"></span>&nbsp;SignUp</a></li><?php endif; ?>
			        </ul>
			    </div>
		    </div>
	</nav>
	
<div class="container">
	<div class="caption">
		<h1 align="center" style="color: white;">Forget Password</h1>
	</div>
	<div class="panel panel-default" style="margin-top: 2%;">
	    <div class="panel-body">
	        <form class="form-horizontal" style="margin-top: 3%;" id="pso_form">
	        	<div class="form-group">
					<label for="name" class="col-sm-2 control-label">Name</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="name" placeholder="Your name" required="required" name="username">
					</div>
				</div>
	        	<div class="form-group">
					<label for="email" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" id="email" placeholder="Your email" required="required" name="email">
					</div>
				</div>				
	        </form>
	    </div>	   
	    <div class="panel-footer">
	    	<p class="text-center"><button type="button" class="btn btn-success btn-lg" id="pso_submit">Submit</button></p>
	    </div>
	</div>
</div>
<script type="text/javascript">
	var SCOPE={
		'save_url':'/PSO/index.php/Home/Changepd/sendValidateEmail',
		'jump_url':'/PSO/index.php/Home/Login/index',
	}
</script>
<div class="container-fluid" style="background-color: #F9F9F9;font-size: 1.3em;position: fixed;bottom: 0;width: 100%;">
			<p></p>
			<p class="text-center"><strong>Platform of Personal Drug Choice for Tumor • ©2017 – HZAU College Of Informatices . All rights reserved.</strong></p>
	</div>
<script src="/PSO/Public/js/jquery-2.0.0.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="/PSO/Public/bootstrap/js/bootstrap.min.js"></script>
<script src="/PSO/Public/js/common.js" type="text/javascript" charset="utf-8"></script>
<script src="/PSO/Public/js/layer/layer.js" type="text/javascript" charset="utf-8"></script>
<script src="/PSO/Public/js/dialog.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>