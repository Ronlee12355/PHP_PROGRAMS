<?php
	include('../connect.php');
	include('../func.php');
    header('content-type:text/html;charset=utf8');
	$id=$_POST['id'];
	$title=$_POST['title'];
	$author=$_POST['author'];
	$desc=$_POST['description'];
	$content=$_POST['content'];
	$title=checkInput($title);
	$author=checkInput($author);
	$desc=checkInput($desc);
	$content=checkInput($content);
	$dateline=date("Y-m-d H:i:s");
	$sql="update article set title='$title',author='$author',description='$desc',content='$content',dateline='$dateline' where id='$id'";
	$result=$mysqli->query($sql);
	if($result){
		echo "<script>alert('修改成功');window.location.href='a.manage.php'</script>";
	}else{
		echo "<script>alert('修改失败');window.location.href='a.manage.php'</script>";
	}
	?>