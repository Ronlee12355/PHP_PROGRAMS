<?php
	define("__ROOT__", str_replace('\\', '/', dirname(__FILE__)));//获得文件根目录名称，提高拓展性
	error_reporting(E_ALL^E_NOTICE);
	$drug=strtoupper(trim($_POST['drug']));
	$genes=trim($_POST['genes']);
	$genes=str_replace("\n", ",", $genes);	
	$genes=strtoupper($genes);
	$genes=str_replace(',',' ',$genes);
	$output=exec("Rscript ".__ROOT__."/download/prediction_my_version.r {$drug} {$genes}");//调用R语言脚本
	if($output){
		$output=json_decode($output,TRUE);
	}
	echo json_encode($output);
?>