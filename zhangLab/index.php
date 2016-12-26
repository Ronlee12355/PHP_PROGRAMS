<!DOCTYPE html HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta charset="UTF-8">
		<title>首页</title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<meta name="Keywords" content="信息学院,张红雨教授,生物信息,农业生物信息湖北省重点实验室"/>
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
			include('./Page/header_index.php');
			include("./inc/db.php");
			?>
			<div class="container-fluid" style="background-color:lightseagreen;padding-bottom:4.5%;">
				<div class="container" id="grid444">
				<div class="caption" style="padding-left:43.5%;margin-bottom:3%;margin-top:4%;">
					<h2 style="font-size: 40px;line-height: 1.8;font-weight: 700;text-shadow: 1px 1px 1px #00000;color:white;">研究方向</h2>
				</div>
				<div class="row">
						<div class="col-md-4" style="margin: auto;width: 33%;text-align: center;margin: auto;">
					  	<img class="img-rounded" src="img/001.jpg" style="width:90%;height:30.8%;margin-bottom:8%;"/>
					    <h4 style="font-family:'微软雅黑';font-weight:600;color:white;">计算基因组学</h4>
					    <a href="./show_project.php?num=0" style="font-size: medium;"><span class="glyphicon glyphicon-search"></span>Learn More></a>	
					  </div>
					  <div class="col-md-4" style="margin: auto;width: 33%;text-align: center;margin: auto;">
					  	<img class="img-rounded" src="img/002.jpg" style="width:90%;height:30.8%;margin-bottom:8%;"/>
					    <h4 style="font-family:'微软雅黑';font-weight:600;color:white;">代谢组学与药物信息学</h4>
					    <a href="./show_project.php?num=1" style="font-size: medium;"><span class="glyphicon glyphicon-search"></span>Learn More></a>	
					  </div>
					  <div class="col-md-4" style="margin: auto;width: 33%;text-align: center;margin: auto;">
					  	<img class="img-rounded" src="img/003.jpg" style="width:90%;height:30.8%;margin-bottom:8%;"/>
					    <h4 style="font-family:'微软雅黑';font-weight:600;color:white;">三维染色质结构建模</h4>
					    <a href="./show_project.php?num=2" style="font-size: medium;"><span class="glyphicon glyphicon-search"></span>Learn More></a>	
					  </div>
					</div>
				</div>
			</div>
			<div class="container-fluid" style="background-color: #F9F9F9;padding-bottom:4%;">
				<div class="container">
					<div class="caption" style="margin-bottom:3%;margin-top:4%;">
						<h2 align="center" style="font-size: 40px;line-height: 1.8;font-weight: 700;">实验室动态</h2>
					</div>
					<ul id="myTab" class="nav nav-tabs">
					    <li class="active" style="width: 33.333333%;"><a href="#xueshu" data-toggle="tab" style="color: black;"><h5 align="center" style="font-size:25px;font-weight: 500;">学术报告</h5></a></li>
					    <li style="width: 33.333333%;"><a href="#kexue" data-toggle="tab" style="color: black;"><h5 align="center" style="font-size:25px;font-weight: 500;">科学前沿</h5></a></li>
					    <li style="width: 33.333333%;"><a href="#tongzhi" data-toggle="tab" style="color: black;"><h5 align="center" style="font-size:25px;font-weight: 500;">通知公告</h5></a></li>
					</ul>
					<div id="myTabContent" class="tab-content">
					    <div class="tab-pane fade in active" id="xueshu">
					        <table class="table">
								 <tbody>
									<?php
										$sql="select * from `report` where 1 order by `istop` desc, `date` desc limit 0,6";
										$sarr=$DB->get_rows_array($sql);
										foreach ($sarr as $v){
										$titl=htmlspecialchars_decode($v['title']);
										$con=htmlspecialchars_decode($v['content']);
										?>
										<tr class="active">
										      <td><span class="glyphicon glyphicon-hand-right"></span>&nbsp;<a href="report.php?id=<?php echo $v['id'];?>"><?php echo $titl;?></a></td>
										      </tr>
										    <?php
										}
										    	?>
										    </tbody>	
										</table>
							<a href="report.php"><button type="button" class="btn btn-info btn-lg btn-block">了解更多</button></a>
					    </div>
					    <div class="tab-pane fade" id="kexue">
					        <table class="table">
								 <tbody>
									<?php
										$sql="select * from `news` where 1 order by `istop` desc, `date` desc limit 0,6";
										$sarr=$DB->get_rows_array($sql);
										foreach ($sarr as $v){
										$titl=htmlspecialchars_decode($v['title']);
										$con=htmlspecialchars_decode($v['content']);
										?>
										<tr class="active">
										      <td><span class="glyphicon glyphicon-hand-right"></span>&nbsp;<a href="news.php?id=<?php echo $v['id'];?>"><?php echo $titl;?></a></td>
										      </tr>
										    <?php
										}
										    	?>
										    </tbody>	
										</table>
										<a href="news.php"><button type="button" class="btn btn-info btn-lg btn-block">了解更多</button></a>
					    </div>
					    
					    <div class="tab-pane fade" id="tongzhi">
					        <table class="table">
								 <tbody>
									<?php
										$sql="select * from `notice` where 1 order by `istop` desc, `date` desc limit 0,6";
										$sarr=$DB->get_rows_array($sql);
										foreach ($sarr as $v){
										$titl=htmlspecialchars_decode($v['title']);
										$con=htmlspecialchars_decode($v['content']);
										?>
										<tr class="active">
										      <td><span class="glyphicon glyphicon-hand-right"></span>&nbsp;<a href="notice.php?id=<?php echo $v['id'];?>"><?php echo $titl;?></a></td>
										      </tr>
										    <?php
										}
										    	?>
										    </tbody>	
										</table>
										<a href="notice.php"><button type="button" class="btn btn-info btn-lg btn-block">了解更多</button></a>
					    </div>
					</div>
				</div>
			</div>
			<div class="container-fluid" style="background-color: #3F4766;padding-bottom:5%;">
				<div class="caption" style="margin-bottom:3%;margin-top:3%;">
					<h2 align="center" style="font-size: 40px;line-height: 1.8;font-weight: 700;color: white;">友情链接</h2>
				</div>
				<div class="container">
				    <div class="row" >
				        <div class="col-xs-6 col-sm-3" style="font-size: 1.5em;">
				            <p><a href="http://coi.hzau.edu.cn/" target="_blank"><span class="glyphicon glyphicon-link"></span>华中农业大学信息学院</a></p>
				        </div>
				        <div class="col-xs-6 col-sm-3" 
				        style="font-size: 1.5em;">
				            <p ><a href="http://www.cbi.pku.edu.cn/index.php" target="_blank"><span class="glyphicon glyphicon-link"></span>北京大学生物信息中心</a></p>
							</div>
				 		<div class="col-xs-6 col-sm-3" 
				        style="font-size: 1.5em;">
				            <p><a href="http://www.hzau.edu.cn/2014/ch/" target="_blank"><span class="glyphicon glyphicon-link"></span>华中农业大学首页</a></p>
				        </div>
				        <div class="col-xs-6 col-sm-3" 
				        style="font-size: 1.5em;">
				            <p><a href="http://bioinfo.au.tsinghua.edu.cn/zh" target="_blank"><span class="glyphicon glyphicon-link"></span>清华大学生物信息中心</a></p>
				        </div>
				    </div>
				</div>
			</div>
	    	<?php
			include('./Page/foot.php');
			?>
	</body>
</html>
