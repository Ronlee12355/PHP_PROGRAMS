<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Upload;

class ImageController extends Controller {
    public function ajaxuploadimage() {
        $upload = new \Think\Upload();
		$upload->subName=date(Y).'/'.date(m).'/'.date(d);
        $res = $upload->upload();
        if($res===false) {
            $this->ajaxReturn(array('status'=>0,'msg'=>'上传失败'));
        }else{
        	echo json_encode(array('data'=>__ROOT__.'/'.C('UPLOAD_NAME').'/'.$res['file']['savepath'].$res['file']['savename'],'status'=>1,'msg'=>'上传成功'));           
        }
    }
    public function ajaxuploadpdf() {
        $upload = new \Think\Upload();
		$upload->subName=date(Y).'/'.date(m).'/'.date(d);
        $res = $upload->upload();
        if($res===false) {
            $this->ajaxReturn(array('status'=>0,'msg'=>'上传失败'));
        }else{
        	echo json_encode(array('data'=>__ROOT__.'/'.C('UPLOAD_NAME').'/'.$res['pdf_file']['savepath'].$res['pdf_file']['savename'],'status'=>1,'msg'=>'上传成功'));           
        }
    }
}