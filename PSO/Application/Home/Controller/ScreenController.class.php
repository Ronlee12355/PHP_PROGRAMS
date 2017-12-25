<?php
namespace Home\Controller;
use Think\Controller;
class ScreenController extends Controller{
	public function screenDrug(){
		//验证传递的参数是否正确
		if(!in_array(array('genechip','rnaseq'), I('post.optionsRadios'))){
			$this->ajaxReturn(array('status'=>0,'msg'=>'Data type error!'));
		}
		if(check_upload($_FILES['input_file']) === false){
			$this->ajaxReturn(array('status'=>0,'msg'=>'Only the excel file is allowed'));
		}
		if($_FILES['input_file']['error'] !== 0){
			$this->ajaxReturn(array('status'=>0,'msg'=>'Data uploaded failed'));
		}
		$email=M('user')->where('id='.session('member_id'))->getField('email');
		//$param3
		$param3=strstr(I('post.optionsRadios'), 'gene') ? 1 : 2;
		//param1
		$input_url=__ROOT__.'/Excel/Input/'.md5($email).'/';
		mk_dirs($input_url);
		$param1=$input_url.I('post.optionsRadios').'_'.date('YmdHis').'.xlsx';
		move_uploaded_file($_FILES['input_file']['tmp_name'], $param1);
		//$param2
		$param2='null';
		//$param4
		$output_url=__ROOT__.'/Excel/Output/'.md5($email).'/';
		mk_dirs($output_url);
		$param4=$output_url.I('post.optionsRadios').'_'.date('YmdHis').'/';
		exec("cd /home/www/html/PSO/PSO_tool;/home/jli/Matlab2015b/bin/matlab -nodisplay -nosplash -nodesktop -r \"DrugScreen_psoriasis('{$param1}','{$param2}',{$param3},'{$param4}')\"")
		
		$param4=strstr($param4, C('WEB_CMSPATH'));
		$output_file=$param4.'Ranked_single_drugs.txt';
		
		$id=M('file_upload')->add(
			array(
				'member_id'=>session('member_id'),
				'email'=>$email,
				'input_url'=>$param1,
				'control_url'=>'',
				'upload_time'=>time(),
			)
		);
		
		M('download')->add(array(
			'member_id'=>session('member_id'),
			'email'=>$email,
			'download_url'=>$param4,
			'create_time'=>time(),
			'data_type'=>I('post.optionsRadios'),
			'record_id'=>$id,
		));
		$this->ajaxReturn(array('status'=>1,'msg'=>'File uploaded successfully, please download the result'))
	}
	
	
	public function screenDrugControl(){
		if(!in_array(array('genechip','rnaseq'), I('post.optionsRadios'))){
			$this->ajaxReturn(array('status'=>0,'msg'=>'Data type error!'));
		}
		if(check_upload($_FILES['input_file']) === false || check_upload($_FILES['control_file']) === false){
			$this->ajaxReturn(array('status'=>0,'msg'=>'Only the excel file is allowed'));
		}
		if($_FILES['input_file']['error'] !== 0 || $_FILES['control_file']['error'] !== 0){
			$this->ajaxReturn(array('status'=>0,'msg'=>'Data uploaded failed'));
		}
		$email=M('user')->where('id='.session('member_id'))->getField('email');
		//$param3
		$param3=strstr(I('post.optionsRadios'), 'gene') ? 1 : 2;
		//param1
		$input_url=__ROOT__.'/Excel/Input/'.md5($email).'/';
		mk_dirs($input_url);
		$param1=$input_url.I('post.optionsRadios').'_'.date('YmdHis').'.xlsx';
		move_uploaded_file($_FILES['input_file']['tmp_name'], $param1);
		//$param2
		$control_url=__ROOT__.'/Excel/Control/'.md5($email).'/';
		mk_dirs($control_url);
		$param2=$control_url.I('post.optionsRadios').'_'.date('YmdHis').'.xlsx';
		move_uploaded_file($_FILES['control_file'], $param2);
		//$param4
		$output_url=__ROOT__.'/Excel/Output/'.md5($email).'/';
		mk_dirs($output_url);
		$param4=$output_url.I('post.optionsRadios').'_'.date('YmdHis').'/';
		exec("cd /home/www/html/PSO/PSO_tool;/home/jli/Matlab2015b/bin/matlab -nodisplay -nosplash -nodesktop -r \"DrugScreen_psoriasis('{$param1}','{$param2}',{$param3},'{$param4}')\"")
		
		$param4=strstr($param4, C('WEB_CMSPATH'));
		$output_file=$param4.'Ranked_single_drugs.txt';
		
		$id=M('file_upload')->add(
			array(
				'member_id'=>session('member_id'),
				'email'=>$email,
				'input_url'=>$param1,
				'control_url'=>$param2,
				'upload_time'=>time(),
			)
		);
		
		M('download')->add(array(
			'member_id'=>session('member_id'),
			'email'=>$email,
			'download_url'=>$param4,
			'create_time'=>time(),
			'data_type'=>I('post.optionsRadios'),
			'record_id'=>$id,
		));
		$this->ajaxReturn(array('status'=>1,'msg'=>'File uploaded successfully, please download the result'))
	}
}
