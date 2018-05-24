<?php
	session_start();
	if($_SESSION['user_name'] == '' || $_SESSION['user_type'] !== 0){
		header('Location: /');
		exit;
	}
	error_reporting(0);
	include str_replace('\\', '/', dirname(__DIR__)).'/front_page/header_inner.php';
	include str_replace('\\', '/', dirname(__DIR__)).'/Login/pdo.php';
	include str_replace('\\', '/', dirname(__DIR__)).'/function.php';
	$pdo=DB::getInstance()->getDB();
	$sql='';
	if(trim_data($_GET['id'])){
		$id=trim_data($_GET['id']);
		$id=filter_var($id,FILTER_SANITIZE_NUMBER_INT);
        $sql=<<<EOF
			SELECT * FROM pm_diagnosis INNER JOIN pm_store ON pm_store.diagnosis_id = pm_diagnosis.diagnosis_id
			INNER JOIN pm_paient ON pm_diagnosis.user_id = pm_paient.user_id
			WHERE pm_store.status=1 AND pm_diagnosis.status=1
			AND pm_store.diagnosis_id={$id} AND pm_diagnosis.record_by={$_SESSION['admin_id']};
EOF;

	}elseif (!isset($_GET['id'])) {
        $sql=<<<EOF
			SELECT * FROM pm_diagnosis INNER JOIN pm_store ON pm_store.diagnosis_id = pm_diagnosis.diagnosis_id
			INNER JOIN pm_paient ON pm_diagnosis.user_id = pm_paient.user_id
			WHERE pm_store.status=1 AND pm_diagnosis.status=1
			AND pm_diagnosis.record_by={$_SESSION['admin_id']};
EOF;
	}

	$res_dl=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
	if(!$res_dl){
		echo '<script>window.history.go(-1);</script>';
		exit;
	}
	include 'front_html/download_index.php';
    //D:/wamp/www/tcga
	include str_replace('\\', '/', dirname(__DIR__)).'/front_page/footer.html';
	?>