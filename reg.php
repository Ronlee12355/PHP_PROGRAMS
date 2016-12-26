<!DOCTYPE html HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<meta name="Keywords" content="湖北省武汉市,华中农业大学,信息学院,张红雨教授,生物信息,农业生物信息湖北省重点实验室"/>
		<meta name="author" content="李姜,Ron Lee,sdj"/>
		<link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.css"/>
		<script src="js/jquery-2.0.0.min.js" type="text/javascript" charset="utf-8"></script>
		<link rel="stylesheet" type="text/css" href="./bootstrap/js/bootstrap.min.js"/>
		<style>
			body{
				margin: 0px;
				padding: 0px;
				background-image: url(./img/login1.jpg);
				background-size: 100%;
			}
			.container{
				width: 598px;
				position: absolute;
				margin-top: 16.5%;
				margin-left:36.5%;
			}
		</style>
		<script type="text/javascript">
			function fresh(){
				$("img").attr("src","./Page/code.php?r="+Math.random(100));
			}
		</script>
		<title>页面注册</title>
	</head>
	<body>
		<div class="container">
			<form class="form-horizontal" role="form" action="Page/doReg.php" method="post">
			  <div class="form-group">
			   <div class="col-sm-10">
			      <input type="text" class="form-control" name="username" placeholder="请输入用户名(必须)">
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-10">
			      <input type="password" class="form-control" name="password" placeholder="请输入密码(必须)">
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-10">
			      <input type="password" class="form-control" name="repassword" placeholder="请再次输入密码(必须)">
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-10" style="width: 60.5%;">
			      <input type="text" class="form-control" name="verify" placeholder="请输入验证码(看不清?请单击验证码)" >
			    </div>
			    <div class="form-group">
			    	<img style="padding-top: 1.5px;" onclick="fresh()" src="./Page/code.php" alt="点击刷新"/>
			    </div>
			    </div>
			  <div class="form-group">
			    <div class="col-sm-10">
			      <button type="submit" class="btn btn-success" style="width:100%;">注册</button>
			      </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-10">
			      <button type="reset" class="btn btn-danger" style="width:100%;">重置</button>
			    </div>
			  </div>
			</form>
		</div>
	</body>
</html>
