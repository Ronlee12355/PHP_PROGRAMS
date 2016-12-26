<?php
	header('content-type:text/html;charset=utf-8');
//	var_dump($_POST['content']);
//	exit;
	if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['content'])){
		echo "<script type='text/javascript'>alert('请将表单填写完整');</script>";
		echo '<meta http-equiv="refresh" content="0.01;url=../contact.php" />';
		die();
	}else{
		$name=$_POST['name'];
		$email=$_POST['email'];
		$content=$_POST['content'];
		if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			$email=filter_var($email,FILTER_SANITIZE_EMAIL);
		}
	$a=mail('feedback@ibi.hzau.edu.cn', '合作事宜',$content,'From:'.$email);
	if($a){
		$response=array(
			'status'=>1,
			'message'=>'邮件发送完毕',
		);
		echo json_encode($response);
		//echo "<script type='text/javascript'>alert('邮件发送完毕');</script>";
		echo '<meta http-equiv="refresh" content="0.01,url=../contact.php" />';
		}else{
			echo "<script type='text/javascript'>alert('邮件发送失败，请点击页面右下角邮件链接，谢谢');</script>";
			echo '<meta http-equiv="refresh" content="0.01,url=../contact.php" />';
		}
	}
?>
