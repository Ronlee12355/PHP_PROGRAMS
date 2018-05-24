<?php
	session_start();
	if($_SESSION['user_name'] == '' || $_SESSION['user_type'] !== 2){
		header('Location: /');
		exit;
	}
	error_reporting(0);
	date_default_timezone_set('Asia/Shanghai');
	include str_replace('\\', '/', dirname(__DIR__)).'/front_page/header_inner.php';
	include str_replace('\\', '/', dirname(__DIR__)).'/Login/pdo.php';//str_replace('\\', '/', dirname(__DIR__))
	include str_replace('\\', '/', dirname(__DIR__)).'/function.php';
	$pdo=DB::getInstance()->getDB();
    $sql='';

	if(trim_data(@$_GET['action']) == 'add'){		
		include 'front_html/add.php';
    }elseif (!isset($_GET['action'])){
        if(trim_data(@$_GET['ID_card']) != ''){
        	$id=trim_data($_GET['ID_card']);
			$id=filter_var($id,FILTER_SANITIZE_STRING);
			$id=substr($id, 0,18);
        	$sql=<<<EOF
                SELECT * FROM pm_diagnosis                 
                INNER JOIN pm_paient ON pm_diagnosis.user_id = pm_paient.user_id
                WHERE pm_diagnosis.status=1 AND pm_paient.status=1 AND pm_paient.ID_card=$id;
EOF;
        }elseif (!isset($_GET['ID_card'])) {
        	$sql=<<<EOF
                SELECT * FROM pm_diagnosis                 
                INNER JOIN pm_paient ON pm_diagnosis.user_id = pm_paient.user_id
                WHERE pm_diagnosis.status=1 AND pm_paient.status=1;
EOF;
        }
		$res=$pdo->query($sql)->fetchAll();
		if(!$res){
			echo '<script>window.history.go(-1);</script>';
			exit;
		}
		include 'front_html/index.php';
    }
	
	include str_replace('\\', '/', dirname(__DIR__)).'/front_page/footer.html';
?>