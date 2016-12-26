<!DOCTYPE html HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
	<head>
		<meta charset="UTF-8">
		<title>研究方向</title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<meta name="Keywords" content="信息学院,张红雨教授,生物信息,农业生物信息湖北省重点实验室"/>
		<meta name="author" content="李姜,Ron Lee,sdj"/>
		<link rel="shortcut icon" href="favicon.ico" />
		<link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.css"/>
		<script src="js/jquery-2.0.0.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="bootstrap/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
		<link rel="stylesheet" type="text/css" href="css/index.css"/>
		<link rel="stylesheet" type="text/css" href="css/foot.css"/>
		<link rel="stylesheet" type="text/css" href="css/show_project.css"/>
	</head>
	<body>
		<?php
			include('./Page/header.php');
			$num=$_GET['num'];
			if(!filter_var($num,FILTER_VALIDATE_INT)){
				$num=0;
			}
			?>
		<div class="container-fluid" style="background-color:#C4DBE1;margin-top:2%;padding-bottom: 2%;padding-top: 2%;">
			<div class="caption" style="margin-top: 2%;">
				<h1 align="center">研究方向</h1>
				<h3 align="center" style="color: #828282;font-family:sans-serif;">实验室研究方向介绍，欢迎合作交流</h3>
			</div>
			<div class="container" style="margin-top: 2%;">
				<ul id="myTab" class="nav nav-tabs">
    				<li class="active"><a href="#home1" data-toggle="tab">计算基因组学</a></li>
				    <li><a href="#home2" data-toggle="tab">代谢组学与药物信息学</a></li>
				    <li><a href="#home3" data-toggle="tab">三维染色质结构建模</a></li>
				    <li><a href="#home4" data-toggle="tab">系统生物学与计算蛋白质组学</a></li>
				</ul>
			<div id="myTabContent" class="tab-content">
			    <div class="tab-pane fade in active" id="home1">
			        <div class="row">
			        	<div class="col-md-5">
			        		<img src="img/001.jpg" class="img-rounded"/>
			        	</div>
			        	<div class="col-md-7">
			        		<div class="caption">
			        			<h2 align="center">计算基因组学</h2>
			        		</div>
			        		<p>&nbsp;&nbsp;课题组组负责人为陈玲玲教授，研究内容是整合国内外农业生物信息资源，建立与动、
			        			植物良种繁育相关的生物信息数据库和基因功能注释软件，最大限度地解析这些数据的生物学意义。
			        		</p>
			        	</div>
			        </div>
			    </div>
			    <div class="tab-pane fade" id="home2">
			        <div class="row">
			        	<div class="col-md-5">
			        		<img src="img/002.jpg" class="img-rounded"/>
			        	</div>
			        	<div class="col-md-7">
			        		<div class="caption">
			        			<h2 align="center">代谢组学与药物信息学</h2>
			        		</div>
			        		<p>&nbsp;&nbsp;课题组负责人为孔德信副教授，研究内容是利用化学信息学和分子模拟等理论方法，
			        			研究各类生物的代谢组(天然产物)数据，对比不 同来源的化合物在化学空间中的分布差异，
			        			分析天然产物在药物设计领域中的内在优势，建立ADME/T的理论预测模型，为基于天然产物的农药设计、
			        			药物发现 提供指导。课题组研究方向包括农药设计、化学生物信息学、代谢组学、分子模拟和药物设计。
			        			我们通过研究开发了生物相关性和生物相关谱的方法，用于探索生物相关化学空间中具有成药潜质的化合物，
			        			并利用模型对其药代动力学性质进行评估预测，并通过细胞模型对其活性进行验证
			        			</p>
			        	</div>
			        </div>
			    </div>
			    <div class="tab-pane fade" id="home3">
			        <div class="row">
			        	<div class="col-md-5">
			        		<img src="img/003.jpg" class="img-rounded"/>
			        	</div>
			        	<div class="col-md-7">
			        		<div class="caption">
			        			<h2 align="center">三维染色质结构建模</h2>
			        		</div>
			        		<p>&nbsp;&nbsp;AutoChrom3D is mainly developed for high-resolution functional 
			        			chromatin domains with genomic size from hundreds of kilobases to megabases. 
			        			Our calculations show that the predicted structures fit epigenetic marks well in the high resolution,
			        			 such as 8kb and 16kb. It is worth to mention that AutoChrom3D can also be applied to 
			        			 larger chromatin regions with lower resolution because previous studies have shown that the 
			        			 global chromatin structure are folded in a hierarchical way, indicating that the principle used in high resolution can still
			        			  hold in low resolution</p>
			        	</div>
			        </div>
			    </div>
			    <div class="tab-pane fade" id="home4">
			        <div class="row">
			        	<div class="col-md-5">
			        		<img src="img/004.png" class="img-rounded"/>
			        	</div>
			        	<div class="col-md-7">
			        		<div class="caption">
			        			<h2 align="center">系统生物学与计算蛋白质组学</h2>
			        		</div>
			        		<p>&nbsp;&nbsp;课题组负责人为马彬广副教授。系统生物学是研究生物系统组成成分的构成与相互关系的结构、
			        			动态与发生，以系统论和实验、计算方法整合研究为特征的生物学。20世纪中页贝塔朗菲定义　
			        			" 机体生物学 " 的 " 机体 " 为 " 整体 " 或 " 系统 " 概念，并阐述以开放系统论研究生物学的理论、
			        			数学模型与应用计算机方法等。系统生物学不同于以往仅仅关心个别的基因和蛋白质的分子生物学，
			        			在于研究细胞信号传导和基因调控网路、生物系统组成之间相互关系的结构和系统功能的涌现。
			        		</p>
			        	</div>
			        </div>
			    </div>
			</div>	
			<script>
			    $(function(){
			    	var num=<?php echo $num;?>;
			        $("#myTab li:eq("+num+") a").tab('show');
			    });
			</script>
			<hr />
			</div>
		</div>
		<?php
			include('./Page/foot.php');
			?>
	</body>
</html>