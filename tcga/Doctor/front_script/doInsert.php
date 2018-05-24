<?php
    //打开session并且连接数据库，获得数据库句柄
    session_start();
	date_default_timezone_set('Asia/Shanghai');
    include str_replace('\\','/',dirname(dirname(__DIR__))).'/Login/pdo.php';
    include str_replace('\\','/',dirname(dirname(__DIR__))).'/function.php';
    $pdo=DB::getInstance()->getDB();

    //验证必要的字段的情况
    $result=array();
    $_POST=array_map("trim_data",$_POST);
    if(intval($_POST['age']) <0 || intval($_POST['age']) > 130){
        $result['status']=0;
        $result['message']='请检查输入年龄';
        echo json_encode($result);
        exit;
    }
    if (strlen($_POST['ID_card']) != 18){
        $result['status']=0;
        $result['message']='请检查输入的身份证号';
        echo json_encode($result);
        exit;
    }
    extract($_POST);
    $diagnosis_desc=str_replace("\r\n","<br />",$diagnosis_desc);
    $operation_desc=str_replace("\r\n","<br />",$operation_desc);
    $formal_disease=str_replace("\r\n","<br />",$formal_disease);
    $chem_treat=str_replace("\r\n","<br />",$chem_treat);
    $x_treat=str_replace("\r\n","<br />",$x_treat);
    $drug_treat=str_replace("\r\n","<br />",$drug_treat);
    $after_x_treat=str_replace("\r\n","<br />",$after_x_treat);
    if ($action == 'add'){
        try{
            //涉及两个数据库的信息写入，所以使用事务处理
            $pdo->beginTransaction();
            $stmt1=$pdo->prepare('INSERT INTO pm_paient(user_id,ID_card,number_hospital,username,age,gender) VALUES (?,?,?,?,?,?)');
            $stmt1->execute(array(NULL,strval($ID_card),$number_hospital,$username,$age,$gender));
            $insert_id1=$pdo->lastInsertId();

            $stmt2=$pdo->prepare('INSERT INTO pm_diagnosis VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
            $stmt2->execute(array(NULL,intval($insert_id1),$hospital,$cancer_type,$smoke_year,$TNM,$PTNM,$diagnosis_desc,$operation_desc,$formal_disease,$chem_treat,$x_treat,
                $drug_treat,$after_x_treat,$time_confirm,$died,$time_dead,$dead_reason,$_SESSION['admin_id'],time(),1));
            $insert_id2=$pdo->lastInsertId();
            if($insert_id1 && $insert_id2){
                $pdo->commit();
                $result['status']=1;
                $result['message']='添加成功';
                $result['url']='/Doctor/insert.php';
                echo json_encode($result);
                exit;
            }
        }catch (PDOException $e){
            $pdo->rollBack();
            $result['status']=0;
            $result['message']='添加失败，'.$e->getMessage();
            echo json_encode($result);
            exit;
        }
    }elseif ($action == 'edit'){
    	//数据更新操作，使用事务靠谱
        try{
            $pdo->beginTransaction();
            $sql_paient='UPDATE pm_paient SET ID_card=?,number_hospital=?,username=?,age=?,gender=? WHERE user_id=?';
            $sql_diagnosis='UPDATE pm_diagnosis SET hospital=?,cancer_type=?,smoke_year=?,TNM=?,PTNM=?,diagnosis_desc=?,operation_desc=?,formal_disease=?,chem_treat=?,
                x_treat=?,drug_treat=?,after_x_treat=?,time_confirm=?,died=?,time_dead=?,dead_reason=?,last_update=? WHERE diagnosis_id=?';
            $st1=$pdo->prepare($sql_paient);
            $update_paient=$st1->execute(array($ID_card,$number_hospital,$username,$age,$gender,$user_id));
            $st2=$pdo->prepare($sql_diagnosis);
            $update_hospital=$st2->execute(array($hospital,$cancer_type,$smoke_year,$TNM,$PTNM,$diagnosis_desc,$operation_desc,$formal_disease,$chem_treat,$x_treat,
                $drug_treat,$after_x_treat,$time_confirm,$died,$time_dead,$dead_reason,time(),$diagnosis_id));
            if($update_hospital && $update_paient){
                $pdo->commit();
                $result['status']=1;
                $result['message']='修改成功';
                $result['url']='/Doctor/insert.php';
                echo json_encode($result);
                exit;
            }
        }catch (PDOException $e){
            $pdo->rollBack();
            $result['status']=0;
            $result['message']='修改失败，'.$e->getMessage();
            echo json_encode($result);
            exit;
        }
    }