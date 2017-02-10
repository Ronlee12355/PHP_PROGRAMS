<?php
	//文件上传检测类
	class upload{
		protected $fileName;
		protected $uploadPath;
		protected $error;
		protected $ext;
		protected $allowMime;
		protected $allowExt;
		protected $imgFlag;
		protected $fileInfo;
		protected $maxSize;
		protected $destination;
		public function __construct($fileName='myFile',$uploadPath='../uploads',$maxSize=5555555555,$imgFlag=true,$allowMime=array('text/plain'),$allowExt=array('txt')){
			$this->fileName=$fileName;//初始化变量，如果用户不输入，就用默认值
			$this->uploadPath=$uploadPath;
			$this->allowExt=$allowExt;
			$this->allowMime=$allowMime;
			$this->imgFlag=$imgFlag;
			$this->maxSize=$maxSize;
			$this->fileInfo=$_FILES[$this->fileName];
		}
		protected function checkError(){//检查错误
			if(!is_null($this->fileInfo)){
				if($this->fileInfo['error']>0){
					switch($this->fileInfo['error']){
						case 1:
							$this->error='超过了PHP配置文件中upload_max_filesize选项的值';
							break;
						case 2:
							$this->error='超过了表单中MAX_FILE_SIZE设置的值';
							break;
						case 3:
							$this->error='文件部分被上传';
							break;
						case 4:
							$this->error='没有选择上传文件';
							break;
						case 6:
							$this->error='没有找到临时目录';
							break;
						case 7:
							$this->error='文件不可写';
							break;
						case 8:
							$this->error='由于PHP的扩展程序中断文件上传';
							break;						
					}
			}else{
				$this->error='文件上传出错';
				return false;
			}			
		}
	}
		protected function checkSize(){//检查文件大小错误
			if($this->fileInfo['size']>$this->maxSize){
				$this->error='上传文件过大';
				return false;
			}else{
				return true;
			}
		}
		
		protected function checkExt(){//检查文件拓展名错误
			$this->ext=strtolower(PATHINFO($this->fileInfo['name'],PATHINFO_EXTENSION));
			if(!in_array($this->ext,$this->allowExt)){
				$this->error='文件类型有误';
				return false;
			}else{
				return true;
			}
		}
		
		protected function checkHTTP(){//检查文件是否通过http方式上传
			if(!is_uploaded_file($this->fileInfo['tmp_name'])){
				$this->error='文件不是通过POST方法上传的';
				return false;
			}else{
				return true;
			}
		}
		protected function checkMime(){//检查文件类型
			if(!in_array($this->fileInfo['type'],$this->allowMime)){
				$this->error='不允许的文件类型';
				return false;
			}else{
				return true;
			}
		}
		
		protected function checkFile(){//检查文件是不是图片
			if($imgFlag){
				if(!@getimagesize($this->fileInfo['tmp_name'])){
				$this->error='不是文件';
				return false;
			}else{
				return true;
			}
		}else{
			return false;
		}
	}
		
		protected function checkDir(){//检查文件上传文件夹是否在，不在就建立一个
			if(!isset($this->uploadPath)){
				mkdir($this->uploadPath,0777,ture);
			}
		}
		
		protected function getUniqName(){//获得上传唯一文件名称
			$name=explode('.', $this->$this->fileInfo['name']);
			return md5($name[0]);
		}
		
		protected function showError(){//报告错误
			echo '<script type="text/javascript">alter("{$this->error}");</script>';
		}
		
		public function uploadFile(){//文件上传主方法
			if($this->checkError()&&$this->checkSize()&&$this->checkExt()&&$this->checkMime()&&$this->checkFile()&&$this->checkHTTP()){
				$this->uploadPath=$this->checkDir();
				
				$this->destination=$this->uploadPath.'/'.$this->getUniqName().'.'.$this->ext;
				if(move_uploaded_file($this->fileInfo['tmp_name'],$this->destination)){
					return $this->destination;
				}else{
					$this->error='文件移动失败';
					$this->showError();
				}
			}else{
				$this->showError();
			}
		}
	}
	
?>