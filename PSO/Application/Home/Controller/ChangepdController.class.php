<?php
namespace Home\Controller;
use Think\Controller;
class ChangepdController extends Controller{
	public function index(){
		$this->assign('f',F('basic_web_config'));
		if(isset($_GET['token'])){
			$token=I('get.token');
			$arr=explode('+', base64_decode($token));
			if(!M('user')->where(array('email'=>$arr[0],'username'=>$arr[1]))->find()){
				$this->error('Something went wrong');
			}
			$this->assign('email',$arr[0]);
			$this->assign('username',$arr[1]);
			$this->display('Changepd/reset');
		}elseif(session('member_id')){
			$res=M('user')->where('id='.session('member_id'))->find();
			$this->assign('email',$res['email']);
			$this->assign('username',$res['username']);
			$this->display('Changepd/reset');
		}else{
			$this->display();
		}
	}
	
	public function doChangePasswd(){
		$username=I('post.username');
		$email=I('post.email');
		$passwd=I('post.passwd');
		$re_passwd=I('post.re_passwd');
		if($passwd !== $re_passwd){
			$this->ajaxReturn(array('status'=>0,'msg'=>'Please make sure you password and re-password is equal'));
		}
		$data['passwd']=get_md5_passwd($passwd);
		$res=M('user')->where(array('email'=>$email,'username'=>$username))->save($data);
		if(!$res){
			$this->ajaxReturn(array('status'=>0,'msg'=>'Something went wrong'));
		}
		$this->ajaxReturn(array('status'=>1,'msg'=>'Password is correctly reseted'));
	}
	
	public function sendValidateEmail(){
		$username=I('post.username');
		$email=I('post.email');
		$isHave=M('user')->where(array('username'=>$username,'email'=>$email))->find();
		//验证邮箱是否已经被注册，邮箱是否正确
		if(!$isHave){
			$this->ajaxReturn(array('status'=>0,'msg'=>'You have not registered yet'));
		}
		$passwd=$isHave['passwd'];
		$key=md5($username.$passwd);
		$p=base64_encode($email.'+'.$username.'+'.$key);
		$time=time();
		$code=md5(C('MD5_PRE').$time);
		$url_send=C('DOMAIN_NAME').'index.php/Home/Changepd/changePasswd?p='.$p.'&code='.$code.'&time='.$time;
		$content="Confirm email for password change\nDear ".$username.":\nHello!\nWelcome to register the GeneRank based drug screen platform for precision psoriasis therapy,we will
			provide you with a professional drug recommendation.\nPlease click the link below to reset your password\n
			$url_send";
		$email_arr=M('email_config')->find();
		$res=send_email($email_arr, $email, 'Reset password on the GeneRank based drug screen platform', $content);
		if($res['error']==1){
			$this->ajaxReturn(array('status'=>0,'msg'=>$res['message']));
		}			
		$this->ajaxReturn(array('status'=>1,'msg'=>'check your mailbox to reset'));		
	}

	public function changePasswd(){
		$time=I('get.time');
		$code=I('get.code');
		if(md5(C('MD5_PRE').$time) != $code){
			$this->error('Your URL must be modified,click again');
		}
		if((time()-$time) >= 15*3600){
			$this->error('Sorry,you must click this link in 15 minutes');
		}
		$p=base64_decode(I('get.p'));
		$arr=explode('+', $p);
		$passwd=M('user')->where(array('email'=>$arr[0],'username'=>$arr[1]))->getField('passwd');
		if(!$passwd){
			$this->error('Sorry,you link has something wrong');
		}
		if(md5($arr[1].$passwd) != $arr[2]){
			$this->error('Sorry,you link has something wrong');
		}
		$token=base64_encode($arr[0].'+'.$arr[1]);
		$this->redirect('Changepd/index',array('param'=>'reset','token'=>$token));		
	}
}
