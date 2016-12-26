<!DOCTYPE html HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
	<head>
		<meta charset="UTF-8">
		<title>通知公告</title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<meta name="Keywords" content="信息学院,张红雨,生物信息,农业生物信息湖北省重点实验室，华中农业大学"/>
		<meta name="author" content="李姜,Ron Lee,sdj"/>
		<link rel="shortcut icon" href="favicon.ico" />
		<link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.css"/>
		<script src="js/jquery-2.0.0.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="bootstrap/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
		<link rel="stylesheet" type="text/css" href="css/index.css"/>
		<link rel="stylesheet" type="text/css" href="css/foot.css"/>
	</head>
	<body>
		<?php
			include('./Page/header.php');
			require "./inc/db.php";
			?>
		<div class="container-fluid" style="background-color:lightblue;margin-top:2%;padding-bottom: 2%;padding-top: 2%;">
			<!--<div class="caption">
				<h1 align="center" style="color:black;">学术报告</h1>
			</div>-->
			<div class="container">
		<?php
			ini_set("error_noticeing","E_ALL & ~E_NOTICE");
			if(preg_match("/[1-9][0-9]*/", @$_GET['id'])){
				$id=$_GET['id'];
			}else{
				$id="";
			}
			if($id!=""){
				?>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
		<?php
		$sql="select * from `notice` where `id`='$id'";
      	//$DB->query($sql);
		$sarr=$DB->get_rows_array($sql);
		foreach ($sarr as $v){
		$titl=htmlspecialchars_decode($v['title']);
		$con=htmlspecialchars_decode($v['content']);
		echo "<p align='center'>$titl</p>";
		}	
		
					         	?>
					         <p align="center"><?php echo date('Y-m-d H:i',strtotime($v['date']));?></p>
					      </h3>
					   </div>
					   <div class="panel-body">
					      <?php
					      	echo $con;
					      	?>
					   </div>
					</div>
				
		<?php
			}else{
				?>
				<div class="panel panel-default">
   <div class="panel-heading" style="text-align: center;"><strong style="font-size: 25px;">通知公告</strong></div>
      <ul class="list-group">
      	<?php
      		$sql="select * from `notice` where 1 order by `istop` desc, `date` desc";
			//$DB->query($sql);
			$sarr=$DB->get_rows_array($sql);
//			var_dump($sarr);exit;
			foreach($sarr as $v){
				$titl=htmlspecialchars_decode($v['title']);
				$con=htmlspecialchars_decode($v['content']);
				?>
				<li class="list-group-item"><a href="notice.php?id=<?php echo $v['id'];?>"><?php echo $titl;?></a></li>
		<?php
			}
      		?>
      
      </ul>
</div>
		<?php
			}
			?>
			</div>
			</div>	
		<?php
			include('./Page/foot.php');
			?>
	</body>
</html>
