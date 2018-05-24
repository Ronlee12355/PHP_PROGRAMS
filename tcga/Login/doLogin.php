<?php
	session_start();
    error_reporting(0);
	$result=array();
	$id=isset($_POST['action'])?trim($_POST['action']):'';
	if($id == 'login'){
		//登录操作
        include str_replace('\\', '/', dirname(__DIR__)).'/function.php';
        $user_name=trim_data($_POST['user_name']);
        $password=strrev(md5(trim_data($_POST['password'])));
        $user_type=intval(trim_data($_POST['user_type']));

        include str_replace('\\','/',__DIR__).'/pdo.php';
        $instance=DB::getInstance();
        $pdo=$instance->getDB();

        $pdo_statement=$pdo->prepare('select admin_id,user_type,status from pm_admin where user_name=? and password=?');
        $pdo_statement->execute(array($user_name,$password));
        $login=$pdo_statement->fetchAll(PDO::FETCH_ASSOC)[0];
        
        if (intval($login['user_type']) == $user_type && intval($login['status']) == 1){
        	
            $result['status']=1;
            $result['message']='登录成功';
            $_SESSION['user_name']=$user_name;
            $_SESSION['user_type']=$user_type;
            $_SESSION['admin_id']=$login['admin_id'];
        }else{
            $result['status']=0;
            $result['message']='登录出错，请重新登录';
        }
		unset($pdo);
		unset($pdo_statement);
        echo json_encode($result);
        exit;

	}else if($id == 'logout'){
		//登出操作
		$_SESSION=array();
		if(isset($_COOKIE[session_name()])){
			setcookie(session_name(),'',time()-1,'/');
		}
		session_destroy();
		$result['status']=1;
		$result['message']='登出成功';
		$result['url']='/Login';
		echo json_encode($result);
		exit;
	}elseif ($id == 'admin-login') {
		include str_replace('\\', '/', dirname(__DIR__)).'/function.php';
        $user_name=trim_data($_POST['user_name']);
        $password=strrev(md5(trim_data($_POST['password'])));
        $user_type='admin';

        include str_replace('\\','/',__DIR__).'/pdo.php';
        $instance=DB::getInstance();
        $pdo=$instance->getDB();

        $pdo_statement=$pdo->prepare('select admin_id,user_type,status from pm_admin where user_name=? and password=?');
        $pdo_statement->execute(array($user_name,$password));
        $login=$pdo_statement->fetch(PDO::FETCH_ASSOC);
        
        if ($login['user_type'] == $user_type && intval($login['status']) == 1){        	
            $result['status']=1;
            $result['message']='登录成功';
			$result['url']='/Admin';
            $_SESSION['admin_name']=$user_name;
            $_SESSION['user_type']=$user_type;            
			$_SESSION['is_admin']='yes';
        }else{
            $result['status']=0;
            $result['message']='登录出错，请重新登录';
        }		
        echo json_encode($result);
        exit;
	}else if($id == 'admin-logout'){
		//登出操作
		$_SESSION=array();
		if(isset($_COOKIE[session_name()])){
			setcookie(session_name(),'',time()-1,'/');
		}
		session_destroy();
		$result['status']=1;
		$result['message']='登出成功';
		$result['url']='/Login/admin.php';
		echo json_encode($result);
		exit;
	}else{
		//防止参数乱传递
		$result['status']=0;
		$result['message']='参数错误';
		echo json_encode($result);
		exit;
	}
