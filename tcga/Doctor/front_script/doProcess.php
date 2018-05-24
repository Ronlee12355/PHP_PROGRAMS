<?php
	//处理基本系统信息
	date_default_timezone_set('Asia/Shanghai');
	set_time_limit(0);
	error_reporting(0);
	if(PHP_OS == 'WINNT'){
		define('__ROOT__', str_replace('\\', '/', dirname(__DIR__)));
	}elseif(PHP_OS == 'Linux'){
		define('__ROOT__', dirname(__DIR__));
	}
	
	//引入文件，生成日期字符串
	$result=array();
	$app=array();
	$relocation=array();
	$app_relocation=array();
	$app_app=array();
	$date=date('YmdHis',time());
	include(str_replace('\\', '/', dirname(dirname(__DIR__))).'/function.php');
	$config=include('config.php');
	
	
	//根据是否有对照文件进行数据处理
	if(!isset($_POST['ctl'])){
		$input_url=__ROOT__.'/'.$config['INPUT_URL'].'/'.$date;
		$output_url=__ROOT__.'/'.$config['OUTPUT_URL'].'/'.$date;
		mkdir($input_url,0777,TRUE);
		mkdir($output_url,0777,TRUE);
		
		if(!check_upload($_FILES['input_file'])){
			$result['status']=0;
			$result['message']='文件上传出错';
			echo json_encode($result);
			exit;
		}
		
		$destion=$input_url.'/'.$_FILES['input_file']['name'];
		move_uploaded_file($_FILES['input_file']['tmp_name'], $destion);		
		$generank=exec(escapeshellcmd(sprintf('%s %s "%s" "%s"',$config['PYTHON'],__ROOT__.'/'.$config['PYTHON_SCRIPT'],$destion,$output_url)));		
		//app
		$content=fopen($output_url.'/'.'app_ks_drug_recommendation.txt', 'r');
		while(!feof($content)){
			$line=explode("\t", trim(fgets($content)));
			array_push($app,array('Drug'=>$line[0],'p-value'=>$line[1]));
		}
		fclose($content);
		//relocation
		$content=fopen($output_url.'/'.'relocation_ks_drug_recommendation.txt', 'r');
		while(!feof($content)){
			$line=explode("\t", trim(fgets($content)));
			array_push($relocation,array('Drug'=>$line[0],'p-value'=>$line[1]));
		}
		fclose($content);
		//app-app
		$content=fopen($output_url.'/'.'app_app_ks_drug_recommendation.txt', 'r');
		while(!feof($content)){
			$line=explode("\t", trim(fgets($content)));
			if($line[2] != 'None'){
				array_push($app_app,array('Drug'=>$line[0],'p-value'=>$line[1],'DDI'=>$line[2]));
			}else{
				array_push($app_app,array('Drug'=>$line[0],'p-value'=>$line[1],'DDI'=>''));
			}
		}
		fclose($content);
		//app-relocation
		$content=fopen($output_url.'/'.'app_relocation_ks_drug_recommendation.txt', 'r');
		while(!feof($content)){
			$line=explode("\t", trim(fgets($content)));
			if($line[2] != 'None'){
				array_push($app_relocation,array('Drug'=>$line[0],'p-value'=>$line[1],'DDI'=>$line[2]));
			}else{
				array_push($app_relocation,array('Drug'=>$line[0],'p-value'=>$line[1],'DDI'=>''));
			}
			
		}
		fclose($content);
		
		$result['app']=$app;
		$result['relocation']=$relocation;
		$result['app_app']=$app_app;
		$result['app_relocation']=$app_relocation;
		$result['status']=1;
		$result['gr']=$generank;
		echo json_encode($result);
		exit;
		
	}elseif($_POST['ctl'] == 'on' && isset($_POST['ctl'])){
		$input_url=__ROOT__.'/'.$config['INPUT_URL'].'/'.$date;
		$output_url=__ROOT__.'/'.$config['OUTPUT_URL'].'/'.$date;
		$control_url=__ROOT__.'/'.$config['CONTROL_URL'].'/'.$date;
		mkdir($input_url,0777,TRUE);
		mkdir($output_url,0777,TRUE);
		mkdir($control_url,0777,TRUE);		
		if(!check_upload($_FILES['input_file']) || !check_upload($_FILES['control_file'])){
			$result['status']=0;
			$result['message']='文件上传出错';
			echo json_encode($result);
			exit;
		}
		$destion=$input_url.'/'.$_FILES['input_file']['name'];
		$control_destion=$control_url.'/'.$_FILES['control_file']['name'];
		move_uploaded_file($_FILES['input_file']['tmp_name'], $destion);
		move_uploaded_file($_FILES['control_file']['tmp_name'],$control_destion);
		$generank=exec(escapeshellcmd(sprintf('%s %s "%s" "%s" "%s"',$config['PYTHON'],__ROOT__.'/'.$config['PYTHON_SCRIPT_CONTROL'],$destion,$control_destion,$output_url)));
		
		
											
		//app
		$content=fopen($output_url.'/'.'app_ks_drug_recommendation.txt', 'r');
		while(!feof($content)){
			$line=explode("\t", trim(fgets($content)));
			array_push($app,array('Drug'=>$line[0],'p-value'=>$line[1]));
		}
		fclose($content);
		//relocation
		$content=fopen($output_url.'/'.'relocation_ks_drug_recommendation.txt', 'r');
		while(!feof($content)){
			$line=explode("\t", trim(fgets($content)));
			array_push($relocation,array('Drug'=>$line[0],'p-value'=>$line[1]));
		}
		fclose($content);
		//app-app
		$content=fopen($output_url.'/'.'app_app_ks_drug_recommendation.txt', 'r');
		while(!feof($content)){
			$line=explode("\t", trim(fgets($content)));
			if($line[2] != 'None'){
				array_push($app_app,array('Drug'=>$line[0],'p-value'=>$line[1],'DDI'=>$line[2]));
			}else{
				array_push($app_app,array('Drug'=>$line[0],'p-value'=>$line[1],'DDI'=>''));
			}
		}
		fclose($content);
		//app-relocation
		$content=fopen($output_url.'/'.'app_relocation_ks_drug_recommendation.txt', 'r');
		while(!feof($content)){
			$line=explode("\t", trim(fgets($content)));
			if($line[2] != 'None'){
				array_push($app_relocation,array('Drug'=>$line[0],'p-value'=>$line[1],'DDI'=>$line[2]));
			}else{
				array_push($app_relocation,array('Drug'=>$line[0],'p-value'=>$line[1],'DDI'=>''));
			}
			
		}
		fclose($content);
		
		$result['app']=$app;
		$result['relocation']=$relocation;
		$result['app_app']=$app_app;
		$result['app_relocation']=$app_relocation;
		$result['status']=1;
		$result['gr']=$generank;
		echo json_encode($result);
		exit;
	}
	