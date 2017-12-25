<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	 $this->assign('f',F('basic_web_config'));
         if(session('member_id')==''){
         	$this->redirect('Index/about');
         }else{
         	$this->display();
         }
    }
	public function about(){
		$this->assign('f',F('basic_web_config'));
		$res=M('upload')->order('id desc')->limit('1')->find();
		//$res['upload_text']=strip_tags($res['upload_text']);
		$this->assign('vo',$res);
		$this->display('Index/about');
	}
	public function showDownload(){
		$this->assign('f',F('basic_web_config'));
		$where['member_id']=session('member_id');
		$where['create_time']=array('gt',time()-7*24*3600);
		$res=M('download')->where($where)->select();
		$this->assign('result',$res);
		$this->display('Index/download');
	}
}