<?php
    session_start();
    date_default_timezone_set('Asia/Shanghai');
    include str_replace('\\','/',dirname(dirname(__DIR__))).'/Login/pdo.php';
    include str_replace('\\','/',dirname(dirname(__DIR__))).'/function.php';
    $pdo=DB::getInstance()->getDB();
    $result=array();
    //排除可能的基本错误
    if (trim_data($_POST['action']) !== 'add'){
        $result['status']=0;
        $result['message']='数据处理不合法';
        exit(json_encode($result));
    }
    if(!check_upload($_FILES['sample_file'])){
        $result['status']=0;
        $result['message']='文件格式错误';
        exit(json_encode($result));
    }

    array_map('trim_data',$_POST);
    extract($_POST);
    $config=include('config.php');
    if ($_FILES['control_file']['name']){
        if(!check_upload($_FILES['control_file'])){
            $result['status']=0;
            $result['message']='文件格式错误';
            exit(json_encode($result));
        }
        $sample_dir=$config['ROOT'].'/'.date('Y/m/d',time()).'/'.$config['FILE_PREFIX'].md5($diagnosis_id);
        mk_dirs($sample_dir);
        $sample_file=$sample_dir.'/'.$_FILES['sample_file']['name'];
        $control_file=$sample_dir.'/'.$_FILES['control_file']['name'];
        if (!move_uploaded_file($_FILES['sample_file']['tmp_name'],$sample_file) || !move_uploaded_file($_FILES['control_file']['tmp_name'],$control_file)){
            $result['status']=0;
            $result['message']='文件上传错误';
            exit(json_encode($result));
        }

        $sql='INSERT INTO pm_store(diagnosis_id,sample,control,access,screen_by,create_time,sample_type,upload_by) VALUES (?,?,?,?,?,?,?,?)';
        $recall=$pdo->prepare($sql)->execute(array(filter_var($diagnosis_id,FILTER_SANITIZE_NUMBER_INT),$sample_file,$control_file,$access,$screen_by,time(),$sample_type,$upload_by));
        if ($recall){
            $result['status']=1;
            $result['message']='文件上传成功';
            $result['url']='/Operator/index.php';
            exit(json_encode($result));
        }else{
            $result['status']=0;
            $result['message']='文件上传失败';
            exit(json_encode($result));
        }
    }else{
        $sample_dir=$config['ROOT'].'/'.date('Y/m/d',time()).'/'.$config['FILE_PREFIX'].md5($diagnosis_id);
        mk_dirs($sample_dir);
        $sample_file=$sample_dir.'/'.$_FILES['sample_file']['name'];
        if (!move_uploaded_file($_FILES['sample_file']['tmp_name'],$sample_file)){
            $result['status']=0;
            $result['message']='文件上传错误';
            exit(json_encode($result));
        }

        $sql='INSERT INTO pm_store(diagnosis_id,sample,access,screen_by,create_time,sample_type,upload_by) VALUES (?,?,?,?,?,?,?)';
        $recall=$pdo->prepare($sql)->execute(array(filter_var($diagnosis_id,FILTER_SANITIZE_NUMBER_INT),$sample_file,$access,$screen_by,time(),$sample_type,$upload_by));
        if ($recall){
            $result['status']=1;
            $result['message']='文件上传成功';
            $result['url']='/Operator/index.php';
            exit(json_encode($result));
        }else{
            $result['status']=0;
            $result['message']='文件上传失败';
            exit(json_encode($result));
        }
    }






