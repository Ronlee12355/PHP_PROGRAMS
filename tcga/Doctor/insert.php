<?php
	session_start();
	if($_SESSION['user_name'] == '' || $_SESSION['user_type'] !== 0){
		header('Location: /');
		exit;
	}
	date_default_timezone_set('Asia/Shanghai');
	include str_replace('\\', '/', dirname(__DIR__)).'/front_page/header_inner.php';
	include str_replace('\\', '/', dirname(__DIR__)).'/Login/pdo.php';//str_replace('\\', '/', dirname(__DIR__))
	include str_replace('\\', '/', dirname(__DIR__)).'/function.php';
	$instance=DB::getInstance();
	$pdo=$instance->getDB();
	$stmt='';
	if(!isset($_GET['action'])){
        //无搜索
        $all_data='';
        if(trim(@$_GET['ID_card']) == ''){
            $stmt=$pdo->prepare('SELECT * FROM pm_diagnosis LEFT JOIN pm_paient ON pm_diagnosis.user_id = pm_paient.user_id WHERE record_by=? AND pm_diagnosis.status=1 GROUP BY last_update DESC');
            $stmt->execute(array($_SESSION['admin_id']));
            $all_data=$stmt->fetchAll(PDO::FETCH_ASSOC);
			include 'front_html/index.php';
        }else{//可能进行搜索选项
        	$ID_card=filter_var($_GET['ID_card'],FILTER_SANITIZE_STRING);
            $stmt=$pdo->prepare('SELECT * FROM pm_diagnosis LEFT JOIN pm_paient ON pm_diagnosis.user_id = pm_paient.user_id WHERE record_by=? AND pm_paient.ID_card=? AND pm_diagnosis.status=1');
            $all_data=$stmt->execute(array($_SESSION['admin_id'],$ID_card));
            $all_data=$stmt->fetchAll(PDO::FETCH_ASSOC);
			if(!$all_data){
				echo '<script>window.history.go(-1);</script>';
				exit;
			}
            include 'front_html/index.php';
        }
	}elseif (trim($_GET['action']) == 'add'){
		include 'front_html/add.php';
	}elseif (trim($_GET['action']) == 'edit'){
		$id=trim_data($_GET['id']);
		$id=filter_var($id,FILTER_SANITIZE_NUMBER_INT);
		$stmt=$pdo->prepare('SELECT * FROM pm_diagnosis LEFT JOIN pm_paient ON pm_diagnosis.user_id = pm_paient.user_id WHERE record_by=? AND pm_diagnosis.diagnosis_id=? AND pm_diagnosis.status=1');
		$edit_data=$stmt->execute(array($_SESSION['admin_id'],$id));
        $edit_data=$stmt->fetch(PDO::FETCH_ASSOC);
		if(!$edit_data){
			echo '<script>window.history.go(-1);</script>';
			exit;
		}
		include 'front_html/edit.php';
	}
		
    //D:/wamp/www/tcga
	include str_replace('\\', '/', dirname(__DIR__)).'/front_page/footer.html';
	?>
	<script type="text/javascript">
	$(document).ready(function() {
		        $('select').material_select();
		        $('.datepicker').pickadate({
					selectMonths: true, // Creates a dropdown to control month
					selectYears: 50,
					format: 'yyyy/mm/dd',
					weekdaysLetter: ['日', '一', '二', '三', '四', '五', '六'],
					today: '今天',
					clear: '清除',
					close: '关闭',
					monthsFull: ['一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月'],
					monthsShort: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
					weekdaysFull: ['周日', '周一', '周二', '周三', '周四', '周五', '周六'],
					onSet: function( arg ){
				        if ( 'select' in arg ){
				            this.close();
				        }
				    }					
				  });		        
		    });
</script>