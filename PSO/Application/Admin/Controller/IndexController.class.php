<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index(){
    	$this->assign('f',F('basic_web_config'));    	 	
    	$this->assign('name',session('username'));
		$arr=array(
			'SERVER_SOFTWARE'=>$_SERVER['SERVER_SOFTWARE'],
			'HTTP_USER_AGENT'=>$_SERVER['HTTP_USER_AGENT'],
			'REMOTE_ADDR'=>$_SERVER['REMOTE_ADDR'],
			'PHP_VERSION'=>PHP_VERSION,
			'MYSQL_VERSION'=>mysql_get_server_info(),
		);
		$this->assign('arr',$arr);
		$this->display();
    }
	
	public function indexConfig(){
		$this->assign('f',F('basic_web_config'));
		$this->assign('name',session('username'));		
		$this->display('Index/info');
	}
}