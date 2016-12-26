<!DOCTYPE html HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
	<head>
		<meta charset="UTF-8">
		<title>科研项目</title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<meta name="Keywords" content="信息学院,张红雨教授,生物信息,农业生物信息湖北省重点实验室"/>
		<meta name="author" content="李姜,Ron Lee,sdj"/>
		<link rel="shortcut icon" href="favicon.ico" />
		<link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.css"/>
		<script src="js/jquery-2.0.0.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="bootstrap/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
		<link rel="stylesheet" type="text/css" href="css/index.css"/>
		<link rel="stylesheet" type="text/css" href="css/foot.css"/>
		<script type="text/javascript">
			$(document).ready(function(){
				$("nav ul li:eq(2)").addClass("active");
			});
		</script>
	</head>
	<body>
<?php
	include './Page/header.php';
	include_once("./inc/db.php");
	$sql_project="select * from projectnew order by proYear desc";
	$arr_pro=$DB->get_rows_array($sql_project);
	?>
	<div class="container-fluid" style="background-color:lightcyan;margin-top:2%;">
		<div class="caption">
			<div class="caption" style="margin-top: 2%;">
				<h2 align="center" style="font-weight: 600">实验室成员近五年承担的主要科研项目</h2>
				<h4 align="center" style="margin-top: 1%;color: gray;">近五年来，实验室承担了973项目、863重大专项、国家自然科学基金、省部级项目等二十余项课题。从承担的研究任务看，实验室研究总体水平已属国内一流。 </h4>
			</div>
			<table class="table table-hover" style="margin-top: 2%;margin-bottom: 2%;"> 
			  <thead>
			    <tr>
			      <th>课题名称</th>
			      <th>立项年份</th>
			      <th>课题类型</th>
			      <th>课题经费（万元）</th>
			      <th>课题负责人</th>
			      <th>承担单位</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php
			  		foreach($arr_pro as $v){
			  		?>
			  	<tr>
			      <td><?php echo $v['proName'];?></td>
			      <td><?php echo $v['proYear'];?></td>
			      <td><?php echo $v['proType'];?></td>
			      <td><?php echo $v['proMoney'];?></td>
			      <td><?php echo $v['proCharger'];?></td>
			      <td><?php echo $v['proOffice'];?></td>
			    </tr>
			  	<?php
			  		}
			  		?>
			    
			  </tbody>
			</table>
		</div>
	</div>
<?php
	include('./Page/foot.php');
	?>
	</body>
</html>