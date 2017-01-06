<?php
	include('config.php');
	ini_set("error_reporting","E_ALL & ~E_NOTICE");
	$mysqli=new mysqli($host,$user,$passwd,$db);
	$mysqli->set_charset('UTF8');
	if($mysqli->errno){
		die("Connection Error:".$mysqli->error);
	}
	?>