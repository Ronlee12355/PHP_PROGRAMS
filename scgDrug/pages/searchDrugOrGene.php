<?php
	require_once '../inc/db.php';
	error_reporting(E_ALL^E_NOTICE);
	$type=$_GET['type'];
	$input=strtoupper(trim($_GET['term']));
	if(!get_magic_quotes_gpc()){
		$input=addslashes($input);
	}
	$all=array();
	$sql_1='';
	$sql_2='';
	$sql_3='';
	$result='';
	switch ($type) {
		case 'gene':					
			$sql_1="SELECT * FROM t_gene WHERE gene_name='{$input}'";
			$result=$DB->fetch_one_array($sql_1);
			$all['gene']=$result;
			$id=$result['gene_entrez_id'];
			$sql_2="SELECT d.drug_name, d.drug_cas_id,d.drug_text,gd.source FROM t_gene_drug AS gd INNER JOIN t_drug AS d ON d.id = gd.drug_id WHERE gd.gene_id ={$id}";
			$all['gd']=$DB->get_rows_array($sql_2);
			$sql_3="SELECT d.disease_name,d.disease_text,gd.source FROM t_gene_disease AS gd INNER JOIN t_disease AS d ON d.id = gd.disease_id WHERE gd.gene_id ={$id}";
			$all['gdi']=$DB->get_rows_array($sql_3);
			echo json_encode($all);
			break;
			
		case 'drug':	
			$sql_1="SELECT * FROM t_drug WHERE drug_name='{$input}'";
			$result=$DB->fetch_one_array($sql_1);
			$all['drug']=$result;
			$Did=$result['id'];
			$sql_2="SELECT d.disease_name,d.disease_text,dd.source FROM t_drug_disease AS dd INNER JOIN t_disease AS d ON d.id=dd.disease_id WHERE dd.drug_id={$Did}";
			$all['dd']=$DB->get_rows_array($sql_2);
			$sql_3="SELECT g.gene_name,g.gene_entrez_id,g.gene_text,dg.source FROM t_gene_drug AS dg INNER JOIN t_gene AS g ON g.gene_entrez_id =dg.gene_id WHERE dg.drug_id={$Did}";
			$all['dg']=$DB->get_rows_array($sql_3);
			echo json_encode($all);
			break;
	}
?>