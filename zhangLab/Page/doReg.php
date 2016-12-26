<?php
	session_start();
	header('content-type:text/html;charset=utf-8');
	require_once('validate_user.php');
	require_once('../inc/db.php');
	if(!filled_post($_POST)){
		$msg=<<<EOF
		<script type="text/javascript">
			alert("请将表单填写完整");
			window.history.go(-1);
		</script>
EOF;
	echo $msg;
	}else{
		if($_SESSION['identify_code']!=$_POST['verify']){
			echo "<script type='text/javascript'>alert('验证码错误，请重新填写');</script>";
			echo "<script type='text/javascript'>window.history.go(-1);</script>";
		}
		if($_POST['password']!=$_POST['repassword']){
			echo "<script type='text/javascript'>alert('两次密码输入有误，请重新输入');</script>";
			echo "<script type='text/javascript'>window.history.go(-1);</script>";
		}
		$sql_reg="INSERT INTO user(username,password,regTime) VALUES (?,?,?)";
		
	}
?>