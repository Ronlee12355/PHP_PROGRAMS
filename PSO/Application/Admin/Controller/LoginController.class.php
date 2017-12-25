<?php
/**
 * Created by PhpStorm.
 * User: Ronlee
 * Date: 2017/12/17
 * Time: 20:36
 */
namespace Admin\Controller;
use Think\Controller;

class LoginController extends Controller{
    public function index(){
    	$this->assign('f',F('basic_web_config'));
        $this->display();
    }
	
	public function doLogin(){
		$validate=array(
			array('username','require','Your name cannot be empty',1),
			array('passwd','require','Password is required',1),
			array('passwd','6,18','Passwords are 6 to 18 bit characters',1,'length'),
		);
		$db=M('admin');
		$isRight=$db->validate($validate)->create();
		if(!$isRight){
			$this->ajaxReturn(array('status'=>0,'msg'=>$db->getError()));
		}
		
		$where['passwd']=get_md5_passwd($isRight['passwd']);
		$where['username']=$isRight['username'];		
		$res=$db->where($where)->getField('id');
		if(!$res){
			$this->ajaxReturn(array('status'=>0,'msg'=>'Please check your username and password'));
		}
		$data['id']=$res;
		$data['login_time']=time();
		$data['ip']=get_client_ip();
		$db->save($data);
		session('is_login',TRUE);
		session('username',$isRight['username']);
		$this->ajaxReturn(array('status'=>1,'msg'=>'Welcome'));
	}
	
	public function doLogOut(){
		$data['username']=session('username');		
		$data['logout_time']=time();
		//$data['username']=$username;
		M('admin')->save($data);
		session('is_login',null);
		session('username',null);
		session('[destroy]');
		$this->redirect('Login/index');	
	}
}