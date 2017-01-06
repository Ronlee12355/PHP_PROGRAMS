<?php
    header('content-type:text/html;charset=utf8');
	include('../connect.php');
	include('../func.php');
	if(!isset($_POST['title']) && !empty($_POST['title'])){
		echo "<script>alert('标题不可为空');window.location.href='a.add.php'</script>";
	}
	if(!isset($_POST['author']) && !empty($_POST['author'])){
		echo "<script>alert('作者不可为空');window.location.href='a.add.php'</script>";
	}
	if(!isset($_POST['description'] )&& !empty($_POST['description'])){
		echo "<script>alert('简介不可为空');window.location.href='a.add.php'</script>";
	}
	if(!isset($_POST['content'])&& !empty($_POST['content'])){
		echo "<script>alert('内容不可为空');window.location.href='a.add.php'</script>";
	}
	$title=$_POST['title'];
	$author=$_POST['author'];
	$desc=$_POST['description'];
	$content=$_POST['content'];
	$title=checkInput($title);
	$author=checkInput($author);
	$desc=checkInput($desc);
	$content=checkInput($content);
	$dateline=date("Y-m-d H:i:s");
	$sql="insert into article(title,author,description,content,dateline) values('$title','$author','$desc','$content','$dateline')";
	$result=$mysqli->query($sql);
	if($result){
		echo "<script>alert('发布成功');window.location.href='a.add.php'</script>";
	}else{
		echo "<script>alert('发布失败');window.location.href='a.add.php'</script>";
	}
	?>