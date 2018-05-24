<?php
    include str_replace('\\','/',dirname(dirname(__DIR__))).'/Login/pdo.php';
    include str_replace('\\','/',dirname(dirname(__DIR__))).'/function.php';
    $pdo=DB::getInstance()->getDB();

    $result=array();
	try{
	    $pdo->beginTransaction();
		$_POST['ID_card']=filter_var($_POST['ID_card'],FILTER_SANITIZE_STRING);
		$_POST['id']=filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
        $recall1=$pdo->exec('UPDATE pm_diagnosis SET status='.trim_data($_POST['status']).' WHERE diagnosis_id='.trim_data($_POST['id']));
        $recall2=$pdo->exec('UPDATE pm_paient SET status='.trim_data($_POST['status']).' WHERE user_id='.trim_data($_POST['ID_card']));
        if($recall1 && $recall2){
            $pdo->commit();
            $result['status']=1;
            $result['message']='删除成功';
			$result['url']='/Doctor/insert.php';
            echo json_encode($result);
            exit;
        }
    }catch (PDOException $e){
        $pdo->rollBack();
        $result['status']=0;
        $result['message']='删除失败';
        echo json_encode($result);
        exit;
    }
