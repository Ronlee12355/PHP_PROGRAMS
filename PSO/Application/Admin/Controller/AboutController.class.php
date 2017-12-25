<?php
namespace Admin\Controller;
use Think\Controller;

class AboutController extends CommonController{
	public function index(){
		$this->assign('name',session('username'));
		$this->assign('f',F('basic_web_config'));
		$this->display();
	}
	
	public function saveFile(){
		$data['upload_img']=I('post.upload_img');
		$data['upload_file']=I('post.upload_file');
		$data['upload_text']=I('post.upload_text');
		$res=M('upload')->add($data);
		if(!$res){
			$this->ajaxReturn(array('status'=>0,'msg'=>'上传失败，请重新上传数据'));
		}
		$this->ajaxReturn(array('status'=>1,'msg'=>'上传成功'));
	}
}
