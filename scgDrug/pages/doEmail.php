<?php
	$txtFile=$_FILES['myFile'];
	$pathinfo=strtolower(pathinfo($txtFile['name'],PATHINFO_EXTENSION));	
	$fileNameWithoutExt=substr($txtFile['name'], 0,strpos($txtFile['name'], '.'));
	if(($pathinfo=='txt') && ($txtFile['type']=='text/plain')){
		$uniqueName=md5($fileNameWithoutExt);
		$destination='../upload/'.$uniqueName.'.txt';
		if(!move_uploaded_file($txtFile['tmp_name'], $destination)){
			echo "<script>alert('文件上传失败，请重新上传');window.location.href='../index.php';</script>";
			exit;
		}else{
			
		}
	}else{
		echo "<script>alert('文件不符合txt文件类型，请重新上传');window.location.href='../index.php';</script>";
		exit;
	}
?>