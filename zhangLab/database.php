<!DOCTYPE html HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
	<head>
		<meta charset="UTF-8">
		<title>数据服务</title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<meta name="Keywords" content="信息学院,张红雨教授,生物信息,农业生物信息湖北省重点实验室"/>
		<meta name="author" content="李姜,Ron Lee,sdj"/>
		<link rel="shortcut icon" href="favicon.ico" />
		<link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.css"/>
		<script src="js/jquery-2.0.0.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="bootstrap/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
		<link rel="stylesheet" type="text/css" href="css/index.css"/>
		<link rel="stylesheet" type="text/css" href="css/foot.css"/>
		<style type="text/css">
			.col-md-4:hover{
				box-shadow: 0 0 24px;
			}
			.col-md-3:hover{
				box-shadow: 0 0 24px;
			}
		</style>
		<script type="text/javascript">
			$(document).ready(function(){
				$("nav ul li:eq(3)").addClass("active");
			});
		</script>
	</head>
	<body>
		<?php
			include('./Page/header.php');
			?>
		<div class="container-fluid" style="background-color:#F0F5F9;margin-top:2%;">
			<div class="caption" style="margin-top: 2%;">
				<h1 align="center">数据服务</h1>
				<h3 align="center" style="color: #828282;font-family:sans-serif;">本网站提供其他实验室的数据库服务和生物信息网站链接,如有任何问题，请与相关网站负责人联系</h3>
			</div>
			<div class="container" style="margin-top: 4.5%;">
				<div class="row">
					<div class="col-md-4" style="background-color: white;width: 32%;margin-right: 2%;">
						<div class="caption">
							<h3 align="center" style="color: #FA3859;">Amphioxus</h3>
						</div>
						<p class="text-center" style="color:gray">文昌鱼基因组功能注释数据库</p>
						<p class="text-center"><a href="http://ibi.hzau.edu.cn/amphioxus/" target="_blank" class="btn btn-success btn-lg" role="button">GO TO</a></p>
					</div>
					<div class="col-md-4" style="background-color: white;width: 32%;margin-right: 2%;">
						<div class="caption">
							<h3 align="center" style="color: #FA3859;">OGAJ</h3>
						</div>
						<p class="text-center" style="color:gray">柑橘基因组数据库</p>
						<p class="text-center"><a href="http://citrus.hzau.edu.cn/orange/" target="_blank" class="btn btn-success btn-lg" role="button">GO TO</a></p>
					</div>
					<div class="col-md-4" style="background-color: white;width: 32%;">
						<div class="caption">
							<h3 align="center" style="color: #FA3859;">PlantNATsDB</h3>
						</div>
						<p class="text-center" style="color:gray">植物自然反义转录数据库</p>
						<p class="text-center"><a href="http://bis.zju.edu.cn/pnatdb/" target="_blank" class="btn btn-success btn-lg" role="button">GO TO</a></p>
					</div>
				</div>
			</div>
			<div class="container" style="margin-top: 4%;margin-bottom: 4%;">
				<div class="row">
					<div class="col-md-3" style="background-color: lightskyblue;width: 24%;margin-right: 1%;">
						<div class="caption">
							<h3 align="center" style="color: #FA3859;">BioRel</h3>
						</div>
						<p class="text-center" style="color:gray">生物相关性网络服务</p>
						<p class="text-center"><a href="http://ibi.hzau.edu.cn/biorel" target="_blank" class="btn btn-success btn-lg" role="button">GO TO</a></p>
					</div>
					<div class="col-md-3" style="background-color: lightskyblue;width: 24%;margin-right: 1%;">
						<div class="caption">
							<h3 align="center" style="color: #FA3859;">RBRDetector</h3>
						</div>
						<p class="text-center" style="color:gray">RNA结合位点预测</p>
						<p class="text-center"><a href="http://ibi.hzau.edu.cn/rbrdetector" target="_blank" class="btn btn-success btn-lg" role="button">GO TO</a></p>
					</div>
					<div class="col-md-3" style="background-color: lightskyblue;width: 24%;margin-right: 1%;">
						<div class="caption">
							<h3 align="center" style="color: #FA3859;">AutoChrom3D</h3>
						</div>
						<p class="text-center" style="color:gray">3D染色质结构建模</p>
						<p class="text-center"><a href="http://ibi.hzau.edu.cn/3dmodel" target="_blank" class="btn btn-success btn-lg" role="button">GO TO</a></p>
					</div>
					<div class="col-md-3" style="background-color: lightskyblue;width: 25%;">
						<div class="caption">
							<h3 align="center" style="color: #FA3859;">FDserver</h3>
						</div>
						<p class="text-center" style="color:gray">Protein Folding Server</p>
						<p class="text-center"><a href="http://ibi.hzau.edu.cn/FDserver" target="_blank" class="btn btn-success btn-lg" role="button">GO TO</a></p>
					</div>
				</div>
			</div>
		</div>
		
		<?php
			include('./Page/foot.php');
			?>
	</body>
</html>