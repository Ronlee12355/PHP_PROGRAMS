<?php
	include('connect.php');
	$id=$_GET['id'];
	$sqlShow="select * from article where id={$id}";
	$resShow=$mysqli->query($sqlShow);
	$rShow=$resShow->fetch_assoc();
	?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
	<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
			<title>文章内容显示</title>
			<meta charset="UTF-8"/>
			<script type="text/javascript" src="js/jquery.js" ></script>
			<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
			<script type="text/javascript" src="bootstrap/js/bootstrap.min.js" ></script>
		</head>
		<body>
			<div class="panel panel-default">
				   <div class="panel-heading">
				      <h3 class="panel-title">
				         <?php echo $rShow['title'];?>
				      </h3>
				   </div>
				   <div class="panel-body">
				      <?php echo $rShow['content'];?>
				   </div>
				</div>
		</body>
		</html>