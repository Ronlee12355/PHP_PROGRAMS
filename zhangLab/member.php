<!DOCTYPE html HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
	<head>
		<meta charset="UTF-8">
		<title>实验室成员</title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<meta name="Keywords" content="信息学院,张红雨教授,生物信息,农业生物信息湖北省重点实验室"/>
		<link rel="shortcut icon" href="favicon.ico" />
		<meta name="author" content="李姜,Ron Lee,sdj"/>
		<link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.css"/>
		<script src="js/jquery-2.0.0.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="bootstrap/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
		<link rel="stylesheet" type="text/css" href="css/index.css"/>
		<link rel="stylesheet" type="text/css" href="css/foot.css"/>
		<script type="text/javascript">
			$(document).ready(function(){
				$("nav ul li:eq(4)").addClass("active");
			});
		</script>
	</head>
	<body>
<?php
	include './Page/header.php';
	include_once("./inc/db.php");
	@$id=$_GET['id'];
	if(!filter_var($id,FILTER_VALIDATE_INT)){
		include('./Page/teacherList.php');
	}else{
	$sql="SELECT * FROM teacherNew WHERE id={$id}";
	$arr_mem=$DB->fetch_one_array($sql);
	$a1=array(" ","\r\n");
	$a2=array("&nbsp;","<br/>");
	$arr_mem['edu']=str_replace($a1, $a2, $arr_mem['edu']);
	$arr_mem['majorExp']=str_replace($a1, $a2, $arr_mem['majorExp']);
	$arr_mem['publication']=str_replace($a1, $a2, $arr_mem['publication']);
	$arr_mem['others']=str_replace($a1, $a2, $arr_mem['others']);
?>
<div class="container-fluid" style="background-color:lightblue;margin-top:2%;padding-bottom: 2%;padding-top: 2%;">
	<div class="container">
		<div class="row">
			<div class="col-md-4" style="padding-top: 2.5%;">
				<img src="img/teacherImg/<?php echo $arr_mem['tname'];?>.jpg" class="img-circle" style="width:100%;height:45%;"/>
			</div>
			<div class="col-md-8">
				<h2 align="center"><b><?php echo $arr_mem['tname'];?></b></h2>
				<h3 align="center"><?php echo $arr_mem['rank'];?></h3>
				<table class="table table-hover">
					<tbody>
				    <tr>
				      <td>学位</td>
				      <td><?php echo $arr_mem['degree'];?></td>
				    </tr>
				    <tr>
				      <td>电话</td>
				      <td><?php echo $arr_mem['tel'];?></td>
				    </tr>
				    <tr>
				      <td>邮箱</td>
				      <td><?php echo $arr_mem['email'];?></td>				      
				    </tr>
				    <tr>
				      <td>工作单位</td>
				      <td><?php echo $arr_mem['degree'];?></td>				      
				    </tr>
				    <tr>
				      <td>研究方向</td>
				      <td><?php echo $arr_mem['researchfiled'];?></td>				      
				    </tr>
				    <tr>
				      <td>教育经历</td>
				      <td><?php echo $arr_mem['edu'];?></td>				      
				    </tr>
				    <tr>
				      <td>主要职历</td>
				      <td><?php echo $arr_mem['majorExp'];?></td>				      
				    </tr>
				   </tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid" style="padding-bottom: 1.1%;background-color: #F9F2F4;">
	<div class="caption" style="margin-top: 1.5%;">
		<h1 align="center">科研成果</h1>
	</div>
	<div class="container" style="word-wrap: break-word;word-break: normal;margin-top: 1.5%;">
		<p class="lead"><?php echo $arr_mem['publication'];?></p>
	</div>
	
	<div class="caption" >
		<h1 align="center">备注</h1>
	</div>
	<div class="container" style="margin-top: 1.5%;">
		<p class="lead"><?php echo $arr_mem['others'];?></p>
		</div>
	</div>
<?php
	}
	include './Page/foot.php';
	?>
	</body>
</html>