<?php
	error_reporting(E_ALL^E_NOTICE);
	$type=$_GET['type'];
	$keywords=strtoupper(trim($_GET['term']));
	$keywords=filter_var($keywords,FILTER_SANITIZE_STRING);
	if(!get_magic_quotes_gpc()){
		$keywords=addslashes($keywords);
	}	
	switch ($type) {
		case 'drug':
			require_once '../inc/db.php';
			$sql="SELECT drug_name FROM t_drug WHERE drug_name LIKE '{$keywords}%' LIMIT 20";
			$result=$DB->get_rows_array($sql);
			$res=array();
			foreach($result as $k=>$v){
				array_push($res,$v['drug_name']);
			}
			echo json_encode($res);
			break;
		case 'gene':
			require_once '../inc/db.php';
			$sql="SELECT gene_name FROM t_gene WHERE gene_name LIKE '{$keywords}%' LIMIT 20";
			$result=$DB->get_rows_array($sql);
			$res=array();
			foreach($result as $k=>$v){
				array_push($res,$v['gene_name']);
			}
			echo json_encode($res);			
			break;
	}
?>