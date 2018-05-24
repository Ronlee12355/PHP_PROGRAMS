<?php
	session_start();
	error_reporting(0);
	if($_SESSION['is_admin'] !== 'yes'){
		header('Location: /Login/admin.php');
		exit;
	}
	include 'front_html/header.html';
	include str_replace('\\', '/', dirname(__DIR__)).'/function.php';
	$action=isset($_GET['action'])?trim_data($_GET['action']):'';
	if($action == 'add'){
        include 'front_html/add.php';
        include 'front_html/foot.html';
        exit;
	}

    //需要使用数据库的地方
	include str_replace('\\', '/', dirname(__DIR__)).'/Login/pdo.php';
	$pdo=DB::getInstance()->getDB();
	$sql='';
	if($action == ''){
		$sql="SELECT * FROM pm_admin WHERE status=1 AND user_type != 'admin'";
		$res=$pdo->query($sql)->fetchAll();
		$all_doctor=$pdo->query("SELECT count(*) AS whole FROM pm_admin WHERE status='1' AND user_type='0'")->fetch()['whole'];
		$all_upload=$pdo->query("SELECT count(*) AS whole FROM pm_admin WHERE status='1' AND user_type='2'")->fetch()['whole'];
		$all_sample=$pdo->query("SELECT count(*) AS whole FROM pm_diagnosis WHERE status=1")->fetch()['whole'];
		include 'front_html/index.php';
	}elseif ($action == 'set'){
		$_GET['id']=filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
		$sql="SELECT * FROM pm_admin WHERE admin_id=".trim_data($_GET['id']);
		$one_user=$pdo->query($sql)->fetch();
		if(!$one_user){
			echo '<script>window.history.go(-1);</script>';
			exit;
		}
		include 'front_html/set.php';
	}
	include 'front_html/foot.html';
?>
