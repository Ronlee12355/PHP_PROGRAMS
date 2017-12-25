<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2017/12/17
 * Time: 20:32
 */
namespace Admin\Controller;
use Think\Controller;

class CommonController extends Controller{
    public function __construct(){
        parent::__construct();
        if(!session('is_login')){
            $this->redirect('Login/index');
        }
    }
}