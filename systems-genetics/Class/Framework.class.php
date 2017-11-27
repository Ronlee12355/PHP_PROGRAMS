<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2017/10/27
 * Time: 21:33
 */
class Framework{
    private static $_method;
    private static $_title;

    /**
     * 获取url的参数
     */
    private static function _getParam(){
        self::$_method=($_GET['m'])?$_GET['m']:'index';
    }

    /**
     * 获取文本中的名称
     */
    public static function changeTitle(){
        $title=file_get_contents(__ROOT__.'/Class/title.txt');
        self::$_title=($title)?htmlspecialchars(trim($title)):'系统遗传学课程网站';
    }
    /**
     * 获取目标目录里面的所有文件
     * @param $dirpath
     * @param $file_list
     */
    public static function getFileList($dirpath=''){
        $file_list=array();
        if (is_dir($dirpath)){
            $handle=opendir($dirpath);
            while($file=readdir($handle)){
                if($file!='.' && $file!='..'){
                    $file=$dirpath.'/'.$file;
                    if (is_file($file) && strtolower(pathinfo($file,PATHINFO_EXTENSION))=='pdf'){
                        $file_list['pdf'][]=$file;
                    }elseif (is_file($file) && strtolower(pathinfo($file,PATHINFO_EXTENSION))=='pptx') {
                    	$file_list['pptx'][]=$file;
                    }
                }
            }
            closedir($handle);
            return $file_list;
        }else{
            die('这不是一个可用的路径');
        }
    }

    /**
     * 框架主方法，用于分析url并且加入模板
     * @param string $dirpath
     */
    public static function runApp($dirpath=''){
        self::_getParam();
        self::changeTitle();
        $file=__ROOT__.'/views/'.self::$_method.'.html';
        if (self::$_method=='index'){
            $file_list=self::getFileList($dirpath);
        }
        require $file;
    }
}