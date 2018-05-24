<?php
    session_start();
    include str_replace('\\','/',dirname(dirname(__DIR__))).'/Login/pdo.php';
    include str_replace('\\','/',dirname(dirname(__DIR__))).'/function.php';
    $pdo=DB::getInstance()->getDB();
	
	$result=array();
	$id=filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
    $store_stmt=$pdo->prepare('SELECT sample,control FROM pm_store WHERE case_id=?');
    $store_stmt->execute(array($id));
    $store_file=$store_stmt->fetch()['sample'];
    $control_file=$store_stmt->fetch()['control'];
    if(!$store_file){
        $result['status']=0;
        $result['message']='删除失败';
        exit(json_encode($result));
    }
    if($control_file){
        $op_smtm=$pdo->prepare('UPDATE pm_store SET sample=?,control=?,status=? WHERE case_id=?');
        $res=$op_smtm->execute(array('','',trim_data($_POST['status']),$id));
        if($res){
            unlink($store_file);
            unlink($control_file);
            rmdir(substr($store_file,0,strrpos($store_file,'/')));
            rmdir(substr($control_file,0,strrpos($store_file,'/')));
            $result['status']=1;
            $result['message']='删除成功';
            $result['url']='/Operator/index.php';
            exit(json_encode($result));
        }else{
            $result['status']=0;
            $result['message']='删除失败';
            exit(json_encode($result));
        }
    }else{
        $op_smtm=$pdo->prepare('UPDATE pm_store SET sample=?,status=? WHERE case_id=?');
        $res=$op_smtm->execute(array('',trim_data($_POST['status']),$id));
        if($res){
            unlink($store_file);
            rmdir(substr($store_file,0,strrpos($store_file,'/')));
            $result['status']=1;
            $result['message']='删除成功';
            $result['url']='/Operator/index.php';
            exit(json_encode($result));
        }else{
            $result['status']=0;
            $result['message']='删除失败';
            exit(json_encode($result));
        }
    }


