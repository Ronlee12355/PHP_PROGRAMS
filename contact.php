<!DOCTYPE html HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
	<head>
		<meta charset="UTF-8">
		<title>联系我们</title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<meta name="Keywords" content="湖北省武汉市,华中农业大学,信息学院,张红雨教授,生物信息,农业生物信息湖北省重点实验室"/>
		<meta name="author" content="李姜,Ron Lee,sdj"/>
		<link rel="shortcut icon" href="favicon.ico" />
		<link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.css"/>
		<script src="js/jquery-2.0.0.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="bootstrap/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
		<link rel="stylesheet" type="text/css" href="css/index.css"/>
		<link rel="stylesheet" type="text/css" href="css/foot.css"/>
		<script type="text/javascript">
			$(document).ready(function(){
				$("nav ul li:eq(6)").addClass("active");
			});
			function checkName(){
					var name=$("input[name='name']").val();
					var email=$("input[name='email']").val();
					var content=$("textarea").val();
						$.ajax({
							type:"post",
							data:{'name':name,'email':email,'content':content},
							url:"./Page/doEmail.php",
							async:true,
							success:function(response){
								if(response.status==1){
									alert(response.message);
								}
							},
							dataType:'JSON',
						});
					}
		</script>
	</head>
	<body>
		<?php
			include('./Page/header.php');
			?>
		<div class="container-fluid" style="background-color:lightblue;margin-top:2%;padding-bottom: 2%;padding-top: 2%;">
			<div class="caption">
				<h1 align="center" style="color: orangered;">KEEP IN TOUCH</h1>
			</div>
			<div class="container">
				<h4 class="text-center" style="font-family:simsun;">Contact us if you are interested in our reasearch and website</h4>
			</div>
			<div class="container" style="margin-top: 1.5%;">
				<form role="form" style="padding-bottom: 1%;" method="post">
					  <div class="form-group" >
					    <input type="text" class="form-control" name="name" placeholder="your name">
					  </div>
					  <div class="form-group">
					    <input type="text" class="form-control" name="email" placeholder="your email address">
					  </div>
					  <div class="form-group">
    					<textarea class="form-control" rows="8" name="content" placeholder="Message"></textarea>
  					  </div>
  					  <div class="btn-group" style="width: 100%;">
  					  	<button type="button" class="btn btn-success " style="width: 45%;margin-right: 1%;" onclick="checkName()">Submit</button>
  					  	<button type="reset" class="btn btn-danger " style="width: 45%;margin-left: 9%;">Reset</button>
  					  </div>
					</form>
			</div>
		</div>
		
		<?php
			include('./Page/foot.php');
			?>
	</body>
</html>
