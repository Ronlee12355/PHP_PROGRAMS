<?php
    header('content-type:text/html;charset=utf8');
	include('../connect.php');
	$id=$_GET['id'];
	$sqlDel="delete from article where id={$id}";
	if($mysqli->query($sqlDel)){
		echo "<script>alert('第{$id}条文章删除成功');window.location.href='a.manage.php'</script>";
	}else{
		echo "<script>alert('第{$id}条文章删除失败');window.location.href='a.manage.php'</script>";
	}
	?>