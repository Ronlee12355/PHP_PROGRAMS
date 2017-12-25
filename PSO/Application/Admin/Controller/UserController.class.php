<?php
namespace Admin\Controller;
use Think\Controller;

class UserController extends CommonController{
	public function index(){
		$where=array();
		if(!empty(I('get.type')) && !empty(I('get.name'))){
			$where[I('get.type')]=I('get.name');
		}
		$where['status']=array('neq',-1);
		$this->assign('f',F('basic_web_config'));
		$users=M('user')->where($where)->order('id desc')->select();
		$this->assign('name',session('username'));
		$this->assign('user',$users);		
		$this->display();
	}
	
	public function edit(){
		$this->assign('f',F('basic_web_config'));
		$id=I('get.id');
		$this->assign('name',session('username'));
		$users=M('user')->where('id='.$id)->find();
		$this->assign('res',$users);
		$this->display();
	}
	
	public function delete(){
		$data['id']=I('post.id');
		$data['status']=I('post.status');
		$res=M('user')->save($data);
		if($res === false){
			$this->ajaxReturn(array('status'=>0,'msg'=>'数据删除失败，请重试'));
		}
		$this->ajaxReturn(array('status'=>1,'msg'=>'数据删除成功'));
	}
	
	public function doEdit(){
		if(I('post.verify') == '1' && M('user')->where(array('email'=>I('post.email')))->getField('verify') == '0'){
			$active_url=C('DOMAIN_NAME').'index.php/Home/Login/userActivite?id='.I('post.id');
			$email_config=M('email_config')->order('id desc')->limit('1')->find();
			
			$content1="Confirm email for GeneRank based drug screen platform registration\nDear {I('post.username')}:\nHello!
			\nWelcome to register the GeneRank based drug screen platform for precision psoriasis therapy,we will
			provide you with a professional drug recommendation.
			\nPlease click the link below to activite your account\n
			{$active_url}";
			send_email($email_config, I('post.email'), 'Confirm email for GeneRank based drug screen platform registration', $content1);
		}
		$data['username']=I('post.username');
		$data['email']=I('post.email');
		$data['designation']=I('post.designation');
		$data['institution']=I('post.institution');
		$data['address']=I('post.address');
		$data['register_time']=strtotime(I('post.register_time'));
		$data['status']=I('post.status');
		$data['verify']=I('post.verify');
		if(!M('user')->where('id='.I('post.id'))->save($data)){
			$this->ajaxReturn(array('status'=>0,'msg'=>'保存失败'));
		}
		$this->ajaxReturn(array('status'=>1,'msg'=>'保存成功'));
	}
}
