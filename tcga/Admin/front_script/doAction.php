<?php
    date_default_timezone_set('Asia/Shanghai');
    include str_replace('\\','/',dirname(dirname(__DIR__))).'/Login/pdo.php';
    include str_replace('\\','/',dirname(dirname(__DIR__))).'/function.php';
    $pdo=DB::getInstance()->getDB();

    //验证必要的字段的情况
    $result=array();
    $_POST=array_map("trim_data",$_POST);
	extract($_POST);
	$sql='';
	$stmt='';
	if($action=='add'){
        $sql=<<<EOF
        INSERT INTO pm_admin(user_name,password,status,user_type,real_name)
        VALUES (?,?,?,?,?);
EOF;
        $stmt=$pdo->prepare($sql);
        $stmt->execute(array(strval($user_name),strrev(md5($password)),$status,$user_type,$real_name));
        if($pdo->lastInsertId()){
            $result['status']=1;
            $result['message']='用户添加成功';
            $result['url']='/Admin';
        }else{
            $result['status']=0;
            $result['message']='用户添加失败';
        }
        exit(json_encode($result));

	}elseif ($action == 'set') {
		$sql='UPDATE pm_admin SET password=? WHERE admin_id=?';
		$stmt=$pdo->prepare($sql);
		$set=$stmt->execute(array(strrev(md5($password)),$admin_id));
        if ($set){
            $result['status']=1;
            $result['message']='用户密码修改成功';
            $result['url']='/Admin';
        }else{
            $result['status']=0;
            $result['message']='用户密码修改失败';
        }
        exit(json_encode($result));
	}elseif ($action == 'delete') {
		$sql="UPDATE pm_admin SET status=? WHERE admin_id=?";
		$stmt=$pdo->prepare($sql);
		$del=$stmt->execute(array($status,$admin_id));
		if ($del){
            $result['status']=1;
            $result['message']='用户注销成功';
            $result['url']='/Admin';
        }else{
            $result['status']=0;
            $result['message']='用户注销失败';
        }
        exit(json_encode($result));
	}
