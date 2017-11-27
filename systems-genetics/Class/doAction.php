<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2017/10/28
 * Time: 9:51
 */
$title=htmlspecialchars(trim($_POST['title']));
if(isset($title)){
    file_put_contents('./title.txt',$title);
}


if(!empty($_FILES['file']['name'])){
    $ext=strtolower(pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION));
    $allowExt=array('pdf','pptx');
    if(!in_array($ext,$allowExt) || !is_uploaded_file($_FILES['file']['tmp_name'])){
        $result=array('status'=>0,'message'=>'请输入正确后缀的文件');
        echo json_encode($result);
        exit;
    }
    if(!ctype_alpha(pathinfo($_FILES['file']['name'],PATHINFO_FILENAME))){
        $_FILES['file']['name']=iconv('UTF-8','gb2312',$_FILES['file']['name']);
    }
    $finalPath=dirname(__DIR__).'/uploads/'.$_FILES['file']['name'];
    if (!move_uploaded_file($_FILES['file']['tmp_name'],$finalPath)){
        $result=array('status'=>0,'message'=>'上传文件失败，请重新上传');
        echo json_encode($result);
        exit;
    }
}


$result=array('status'=>1,'message'=>'操作成功');
echo json_encode($result);