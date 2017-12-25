<?php
namespace Admin\Controller;
use Think\Controller;

class BasicController extends CommonController{
	public function index(){
		$res=F('basic_web_config');
		$this->assign('name',session('username'));
		$this->assign('f',$res);
		$this->display();
	}
	
	public function add(){		
		if(IS_POST){
			if(!I('post.title')){
				$this->ajaxReturn(array('status'=>0,'msg'=>'站点信息不能为空'));
			}
			if(!I('post.keywords')){
				$this->ajaxReturn(array('status'=>0,'msg'=>'站点关键词不能为空'));
			}
			if(!I('post.description')){
				$this->ajaxReturn(array('status'=>0,'msg'=>'站点描述不能为空'));
			}
			F('basic_web_config',I('post.'));			
			$this->ajaxReturn(array('status'=>1,'msg'=>'配置成功'));
		}else{
			$this->ajaxReturn(array('status'=>0,'msg'=>'没有提交的数据'));
		}
	}
}
