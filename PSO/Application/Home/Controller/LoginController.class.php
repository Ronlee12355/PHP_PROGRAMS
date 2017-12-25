<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller{
	public function login(){
		$this->assign('f',F('basic_web_config'));
		$this->display('Login/index');
	}
	public function signUp(){
		$this->assign('f',F('basic_web_config'));
		$this->display('Login/register');
	}
	public function doSignUp(){
		$db=M('user');
		$isSet=$db->where(array('email'=>I('post.email')))->find();
		if($isSet){
			$this->ajaxReturn(array('status'=>0,'msg'=>'This email has been registered!'));
		}
		$validate=array(
			array('username','require','Your name cannot be empty',1),
			array('email','require','Email should not be empty',1),
			array('email','email','Your email is not formatly right',1),
			array('passwd','require','Password is required',1),
			array('passwd','6,18','Passwords are 6 to 18 bit characters',1,'length'),
			array('designation','require','designation is required',1),
			array('institution','require','institution is required',1),
			array('address','require','address is required',1),
			array('user_type','academic,business','User type is not correct',1,'in'),
		);
		
		
		$isRight=$db->validate($validate)->create();
		if(!$isRight){
			$this->ajaxReturn(array('status'=>0,'msg'=>$db->getError()));
		}else{						
			$db->register_time=time();
			$db->passwd=get_md5_passwd($isRight['passwd']);			
			$lastId=$db->add();
			if(!$lastId){
				$this->ajaxReturn(array('status'=>0,'msg'=>$db->getDbError()));
			}
			
			$email_config=M('email_config')->order('id desc')->limit('1')->find();
						
			$content2="There is one new user to register";
						
			$res=send_email($email_config, $email_config['email_username'], 'New user to register', $content2);						
			if($res['error']==1){
				$this->ajaxReturn(array('status'=>0,'msg'=>$res['message']));
			}			
			$this->ajaxReturn(array('status'=>1,'msg'=>'You have successfully registered,the activite email will be sent after the administrator verify'));
		}
	}
	
	public function userActivite(){
		$id=intval(I('get.id'));
		$data['status']=1;
		$data['active_time']=time();
		$res=M('user')->where(array('id'=>$id))->save($data);
		if($res){
			$this->success('You have successfully activited!','Login/index',4);
		}else{
			$this->error('Activition Failed');
		}
	}
	
	public function loginOut(){
		session('member_id',null);
		session('[destroy]');
		$this->redirect('Login/login');		
	}
	
	public function doLogin(){
		$db=M('user');				
		$id=$db->where(array('email'=>I('post.email'),'passwd'=>get_md5_passwd(I('post.passwd'))))->find();		
		if(!$id['id'] || intval($id['status'])!==1){
			$this->ajaxReturn(array('status'=>0,'msg'=>'Login failed,please try again'));
		}
		session('member_id',$id['id']);
		$this->ajaxReturn(array('status'=>1,'msg'=>'Welcome~~'));
	}
}
