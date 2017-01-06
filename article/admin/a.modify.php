<?php
	include('../connect.php');
	$idMod=$_GET['id'];
	$sqlMod="select * from article where id={$idMod}";
	$reMod=$mysqli->query($sqlMod);
	$rMod=$reMod->fetch_assoc();
?>
	<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>用户修改模块</title>
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
		<script type="text/javascript" src="../js/jquery.js" ></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js" ></script>
		
	</head>
	<body>
		<div class="main_left" style="position: absolute;margin-left: 150px;margin-top: 57px;">
			<p style="font-size: x-large;margin-bottom: 40px;"><a href="./a.add.php">发布文章</a></p>
			<p style="font-size: x-large;"><a href="./a.manage.php">管理文章</a></p>
		</div>
		<div class="main" style="width: 80%;margin-left: 180px;">
			<h2  style="margin-left: 186px;margin-bottom: 20px;">用户添加表</h2>
		<form class="form-horizontal" role="form" method="post" action="a.modify.handle.php">
			<input type="hidden" name="id" id="id" value="<?php echo $rMod['id'];?>" />
			<div class="form-group">
      <label for="title" class="col-sm-2 control-label">标题</label>
      <div class="col-sm-10">
         <input type="text" class="form-control" name="title" 
             style="width: 200px;" value="<?php echo $rMod['title'];?>">
      </div>
   </div>
   <div class="form-group">
      <label for="author" class="col-sm-2 control-label">作者</label>
      <div class="col-sm-10">
         <input type="text" class="form-control" name="author" 
            style="width: 200px;" value="<?php echo $rMod['author'];?>">
      </div>
   </div>
   <div class="form-group">
      <label for="description" class="col-sm-2 control-label">简介</label>
      <div class="col-sm-10">
         <textarea name="description" rows="5" cols="60" value=""><?php echo $rMod['description'];?></textarea>
      </div>
   </div>
   <div class="form-group">
      <label for="content" class="col-sm-2 control-label">内容</label>
      <div class="col-sm-10">
         <textarea name="content" rows="15" cols="60" value=""><?php echo $rMod['content'];?></textarea>
      </div>
   </div>
   <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
         <button type="submit" class="btn btn-primary btn-lg" style="width:100px;">提交</button>
         <button type="reset" class="btn btn-primary btn-lg" style="width:100px; margin-left: 40px;">重置</button>
      </div>
   </div>
</form>

</div>
	</body>
</html>