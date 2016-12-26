<!DOCTYPE html HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
	<head>
		<meta charset="UTF-8">
		<title>实验室藏书</title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<meta name="Keywords" content="湖北省武汉市,华中农业大学,信息学院,张红雨教授,生物信息,农业生物信息湖北省重点实验室"/>
		<meta name="author" content="李姜,Ron Lee,sdj"/>
		<link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.css"/>
		<script src="js/jquery-2.0.0.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="bootstrap/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/jquery.page.js" type="text/javascript" charset="utf-8"></script>
		<link rel="stylesheet" type="text/css" href="css/index.css"/>
		<link rel="stylesheet" type="text/css" href="css/foot.css"/>
		<script type="text/javascript">
			$(document).ready(function(){
				$("nav ul li:eq(5)").addClass("active");
			});
		</script>
	</head>
	<body>
<?php
	include './Page/header.php';
	include_once("./inc/db.php");
?>
<div class="container-fluid" style="background-color:#F0F5F9;margin-top:2%;padding-bottom: 2%;padding-top: 2%;">
	<div class="caption">
		<h1 align="center" style="color:#92BA40;">实验室藏书</h1>
	</div>
	<div class="container-fluid" style="margin-top: 2%;">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>编号</th>
					<th>书名</th>
					<th>作者</th>
					<th>出版社</th>
					<th>数量</th>
				</tr>
			</thead>
			<tbody>
				<?php
					@$currentPage=$_GET['p']?$_GET['p']:1;
					$total=$DB->get_total_num("select count(*) from books");
					$num_page=10;
					$maxPage=ceil($total/$num_page);
					if($currentPage<1 || $currentPage>18){
						echo "<script>alert('请输入不大于{$maxPage}的页码数');</script>";
						$currentPage=1;
					}
					if(!filter_var($currentPage,FILTER_VALIDATE_INT)){
						echo "<script>alert('请输入正确的的页码数');</script>";
						$currentPage=1;
					}
					$start_num=($currentPage-1)*$num_page;
					$sql_book="select * from books limit {$start_num},{$num_page}";
					$arr=$DB->get_rows_array($sql_book);
					foreach($arr as $v){
						?>
					<tr>
						<td><?php echo $v['NO']; ?></td>
						<td><?php echo $v['name'];?></td>
						<td><?php echo $v['author'];?></td>
						<td><?php echo $v['publisher'];?></td>
						<td><?php echo $v['count'];?></td>
					</tr>
				<?php
					}
					?>
			</tbody>
		</table>
		<div class="container" style="width: 20%;">
			<ul class="pager">
				<?php
					if($currentPage==1){
						$prePage=$currentPage;
					}else{
						$prePage=$currentPage-1;
					}
					if($currentPage==$maxPage){
						$afterPage=$currentPage;
					}else{
						$afterPage=$currentPage+1;
					}
					?>
    			<li class="previous"><a href="book.php?p=<?php echo $prePage;?>">&larr;上一页</a></li>
    			<li class="next"><a href="book.php?p=<?php echo $afterPage;?>">下一页 &rarr;</a></li>
			</ul>
		</div>
	</div>
</div>
<?php
	include './Page/foot.php';
	?>
	</body>
</html>