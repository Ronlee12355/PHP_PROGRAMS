<?php
namespace Admin\Controller;
use Think\Controller;

class MailconfigController extends CommonController{
	public function index(){
		$this->assign('f',F('basic_web_config'));
		$res=M('email_config')->order('id desc')->limit('1')->find();
		$res['email_password']=base64_decode(strrev($res['email_password']));
		$this->assign('name',session('username'));
		$this->assign('res',$res);
		$this->display();
	}
	
	public function edit(){
		$db=M('email_config');
		$validate=array(
			array('email_smtp_secure',array('','ssl','tls'),'SMTP安全协议不符合要求',1,'in'),
			array('email_smtp','require','smtp必须填写',1),
			array('email_username','require','邮件发送姓名必须填写',1),
			array('email_password','require','邮件密码必须填写',1),
			array('email_port','require','邮件发送端口号必须填写',1),
			array('email_from_name','require','邮件发送端口号必须填写',1),
		);
		$isRight=$db->validate($validate)->create();
		if(!$isRight){
			$this->ajaxReturn(array('status'=>0,'msg'=>$db->getError()));
		}
		
		$db->email_password=strrev(base64_encode($db->email_password));
		$db->edit_time=time();
		$res=$db->add();
		if(!$res){
			$this->ajaxReturn(array('status'=>0,'msg'=>'数据保存出错，请重试'));
		}
		$this->ajaxReturn(array('status'=>1,'msg'=>'保存成功'));
	}
	
	public function sendTest(){
		$arr=array();
		$arr['email_smtp']=I('post.email_smtp');
		$arr['email_username']=I('post.email_username');
		$arr['email_password']=strrev(base64_encode(I('post.email_password')));
		$arr['email_from_name']=I('post.email_from_name');
		$arr['email_smtp_secure']=I('post.email_smtp_secure');
		$arr['email_port']=I('post.email_port');
		$content='这是一份测试邮件，如果您收到这封邮件，证明您的邮件系统正常，祝贺您测试成功';		
		
		$res=send_email($arr, I('post.send_to'), '测试邮件', $content);
		if($res['error']==1){
			$this->ajaxReturn(array('status'=>0,'msg'=>$res['message']));
		}
		$this->ajaxReturn(array('status'=>1,'msg'=>'发送成功'));
	}
}
